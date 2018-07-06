    function OnOff(data_status){

       $("#tombol_cek").button("loading");
        
        message = new Paho.MQTT.Message(data_status);
        message.destinationName = '/' + '102' + '/set'
        client.send(message);
    };

   
  // called when the client connects
  function onConnect() {
    // Once a connection has been made, make a subscription and send a message.
    console.log("onConnect");
    client.subscribe("#");
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
    
    if(data_message.kwh >= set_kwh){
       
        if(data_message.r != 0){
          OnOff("0");
        }

        ubah_tombol(0);
        
        console.log('memnuhi kondisi');

    }else if(data_message.r != undefined){

        console.log(data_message.r);
        
        ubah_tombol(data_message.r);

        console.log('Tidak memnuhi kondisi');
    }
    
    // if (message.destinationName == '/' + 'esp' + '/' + 'test') { //ac� coloco el topic
    //     document.getElementById("temperatura").textContent = message.payloadString  + " �C";
    // }

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