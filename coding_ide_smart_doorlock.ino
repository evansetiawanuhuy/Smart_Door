#include <SPI.h>
#include <MFRC522.h>
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);

#define SS_PIN D10
#define RST_PIN D9
#define relay D2
#define relay_off 1
#define relay_on 0
MFRC522 mfrc522(SS_PIN, RST_PIN);   // Create MFRC522 instance.

String card1 = "81 B0 1F 26";
String card2 = "C3 1D AD 94";
String card3 = "xxxxxx"; //e-ktp
String card4 = "xxxxxx";
String status1 = "Diterima";
String status2 = "Ditolak";
void setup() 
{
  pinMode(relay,OUTPUT);  
  digitalWrite(relay,relay_off);
  lcd.begin();
  Serial.begin(9600);   // Initiate a serial communication
  SPI.begin();      // Initiate  SPI bus
  mfrc522.PCD_Init();   // Initiate MFRC522
  Serial.println("Silahkan Tempel Kartu Anda......");
  Serial.println();

//LOADING SCREEN
  lcd.setCursor(0,0);
  lcd.print("SMART DOORLOCK");
  lcd.setCursor(0,1);
  lcd.print("Loading");
  lcd.setCursor(7,1);
  lcd.print(".");
  delay(200);
  lcd.setCursor(8,1);
  lcd.print(".");
  delay(200);
  lcd.setCursor(9,1);
  lcd.print(".");
  delay(200);
  lcd.setCursor(10,1);
  lcd.print(".");
  delay(200);
  lcd.setCursor(11,1);
  lcd.print(".");
  delay(200);
  lcd.setCursor(12,1);
  lcd.print(".");
  delay(1000);
  lcd.clear();

}
void loop()
{
  lcd.setCursor(0,0);
  lcd.print("Tap Kartu Anda");
  lcd.setCursor(0,1);
  lcd.print("Status: ");
  // Look for new cards
  if ( ! mfrc522.PICC_IsNewCardPresent()) 
  {
    return;
  }
  // Select one of the cards
  if ( ! mfrc522.PICC_ReadCardSerial()) 
  {
    return;
  }
  //Show UID on serial monitor
  Serial.print("UID tag :");
  String content= "";
  byte letter;
  for (byte i = 0; i < mfrc522.uid.size; i++) 
  {
     Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
     Serial.print(mfrc522.uid.uidByte[i], HEX);
     content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
     content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
  Serial.println();
  Serial.print("Message : ");
  content.toUpperCase();
  if (content.substring(1) == card1 ||content.substring(1) == card2 || content.substring(1) == card3 ) //to find card uid go to the serial moniter, scan your card and copy uid into the section

  {
  digitalWrite(relay,relay_on);
  lcd.setCursor (7,1);
  lcd.print(status1);
  delay(3000);
  lcd.clear();
  Serial.println("AKSES DITERIMA");
  digitalWrite(relay,relay_off);
  return;
  }
 
 else   {
  lcd.setCursor (7,1);
  lcd.print(status2);
  delay(3000);
  lcd.clear();
  for(byte i = 0; i< mfrc522.uid.size; i++){
    Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? "0" : "");
    Serial.print(mfrc522.uid.uidByte[i],HEX);
    }
  }
}
