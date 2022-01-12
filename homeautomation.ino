
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <Arduino.h>


const char* ssid = "wifiname";
const char* password = "wifi password";
String lightStatus = "off";

void setup () {
 pinMode(13, OUTPUT);
Serial.begin(9600);
WiFi.begin(ssid, password);
 
while (WiFi.status() != WL_CONNECTED) {
 
delay(1000);
Serial.print("Connecting..");
 
}
 
}
 
void loop() {



  


if (WiFi.status() == WL_CONNECTED) {
  
  //Check WiFi connection status
   WiFiClient Client;
 HTTPClient http;  //Declare an object of class HTTPClient
 http.begin(Client, "http://APIWEBSITELINK/control.php?pass=azamSheikh&proc=commandGet");  //Specify request destination
int httpCode = http.GET();                                                                  //Send the request
 if (httpCode > 0) { //Check the returning code
 String payload = http.getString();   //Get the request response payload
//int intpayload = payload.toInt();
Serial.println(payload);
if(payload == "on")
{
  digitalWrite(13, HIGH);
  lightStatus = "on";
}

else if(payload == "off"){
  digitalWrite(13, LOW);
   lightStatus = "off";
}

else{}

 
http.end();   //Close connection
}
}




if (WiFi.status() == WL_CONNECTED) {
  
  //Check WiFi connection status
  WiFiClient Client;
 HTTPClient http;  //Declare an object of class HTTPClient
 http.begin(Client, "http://http://APIWEBSITELINK/control.php?pass=azamSheikh&proc=neutral");  //Specify request destination
int httpCode = http.GET();                                                                  //Send the request
 if (httpCode > 0) { //Check the returning code
 String payload = http.getString();   //Get the request response payload
//int intpayload = payload.toInt();

http.end();   //Close connection
}
}





String url1 = "http://http://APIWEBSITELINK/control.php?pass=azamSheikh&proc=putStatus&com=";
String finalurl = url1+lightStatus;
if (WiFi.status() == WL_CONNECTED) {
  
  //Check WiFi connection status
  WiFiClient Client;
 HTTPClient http;  //Declare an object of class HTTPClient
 http.begin(Client, finalurl);  //Specify request destination
int httpCode = http.GET();                                                                  //Send the request
 if (httpCode > 0) { //Check the returning code
 String payload = http.getString();   //Get the request response payload
//int intpayload = payload.toInt();

http.end();   //Close connection
}
}





}
