    function OnOff(data_status){

       $("#tombol_cek").button("loading");
        
        message = new Paho.MQTT.Message(data_status);
        message.destinationName = '/' + '102' + '/set'
        client.send(message);
    };

   
  // called when the client connects
  function onConnect() {

    swal(
      'Success',
      'Koneksi ke server',
      'success'
    )

    $('#btn_set_kwh').button('reset');

    client.subscribe("/102/data");

  }

    
  // called when the client loses its connection
  function onConnectionLost(responseObject) {
    if (responseObject.errorCode !== 0) {
      document.getElementById("tempat_error").innerText = responseObject.errorMessage;
      
      var errDiv = document.getElementById("error");
      errDiv.style.display = "block";

      console.log("onConnectionLost:", responseObject.errorMessage);
      setTimeout(function() { client.connect() }, 5000);

    }
  }
    
  // called when a message arrives
  function onMessageArrived(message) {
    
    var data_message = JSON.parse(message.payloadString);

    insert_data(data_message);
    
    if(data_message.kwh >= set_kwh){
       
        if(data_message.r != 0){
          OnOff("0");
        }

        ubah_tombol(0);
        

    }else if(data_message.r != undefined){

        tempat_daya.push([Date.now(), data_message.d]);
        tempat_arus.push([Date.now(), data_message.a]);
        tempat_tegangan.push([Date.now(), data_message.v]);
        tempat_kwh.push([Date.now(), data_message.kwh]);

        chart1.series[0].setData(tempat_daya);
        chart2.series[0].setData(tempat_arus);
        chart3.series[0].setData(tempat_tegangan);
        chart4.series[0].setData(tempat_kwh);


        if(set_tombol == undefined || set_tombol == data_message.r){
          ubah_tombol(data_message.r);
        }

    }
    
    // if (message.destinationName == '/' + 'esp' + '/' + 'test') { //ac� coloco el topic
    //     document.getElementById("temperatura").textContent = message.payloadString  + " �C";
    // }

  }

  function insert_data(data){
      $.ajax({
        url:url,
        method:'POST',
        data:{id:data.id,a:data.a,w:data.w,v:data.v,r:data.r,kwh:data.kwh}
      });
  }


    function onFailure(invocationContext, errorCode, errorMessage) {
      var errDiv = document.getElementById("error");
      errDiv.style.display = "block";

    }
    
    var clientId = "ws" + Math.random();
    // Create a client instance
    var client = new Paho.MQTT.Client("m14.cloudmqtt.com", 33964, clientId);
    
    // set callback handlers
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;
    
    // connect the client
    client.connect({
      useSSL: true,
      userName: usurname,
      password: password,
      onSuccess: onConnect,
      onFailure: onFailure
    });