#include "DHT.h"
#include <WiFi.h>
#include <HTTPClient.h>

#define DHTPIN 13
#define DHTTYPE DHT11

const char* ssid = "RUMAH ALI";
const char* password = "26245810";
const char* ip_server = "192.168.100.149"; // Tanpa "http://" dan port

DHT dht(DHTPIN, DHTTYPE);

void setup() {
  Serial.begin(9600);
  dht.begin();

  // Inisialisasi koneksi WiFi
  Serial.print("Menghubungkan ke ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi terhubung");
  Serial.print("Alamat IP: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  float temp = dht.readTemperature();
  int hum = dht.readHumidity();

  Serial.print("Suhu : ");
  Serial.println(temp);
  Serial.print("Kelembaban : ");
  Serial.println(hum);

  WiFiClient client;
  const int port = 8083; // Sesuaikan dengan port server web Anda

  if (!client.connect(ip_server, port)) {
    Serial.println("Gagal Konek");
    return;
  }

  String Link = "http://" + String(ip_server) + ":"+ String(port) +"/projekIoT/Monitoring/sendData/" + String(temp) + "/" + String(hum);
  HTTPClient http;

  http.begin(Link);
  http.GET();
  http.end();
  delay(1000);
}
