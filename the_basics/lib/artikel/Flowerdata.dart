import 'package:flutter/material.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;
 

 void main() => runApp(MyApp());
 
class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text('tes get')
          ),
        body: JsonImageList(),
      ),
    );
  }
}

 
class Flowerdata {
 int no;
 String judul;
 String isi;
 String foto;
 String tanggal;
 
  Flowerdata({
    this.no,
    this.judul,
    this.isi,
    this.foto,
    this.tanggal
  });
 
  factory Flowerdata.fromJson(Map<String, dynamic> json) {
    return Flowerdata(
      no: json['no'],
      judul: json['judul'],
      isi: json['isi'],
      foto: json['foto'],
      tanggal: json['tanggal']
 
    );
  }
}
 
class JsonImageList extends StatefulWidget {
 
  JsonImageListWidget createState() => JsonImageListWidget();
 
}
 
class JsonImageListWidget extends State {
 
  final String apiURL = 'http://192.168.1.6/kentangtech/backend/flutter/artikelflutter.php';
 
  Future<List<Flowerdata>> fetchFlowers() async {
 
    var response = await http.get(apiURL);
 
    if (response.statusCode == 200) {
 
      final items = json.decode(response.body).cast<Map<String, dynamic>>();
 
      List<Flowerdata> listOfFruits = items.map<Flowerdata>((json) {
        return Flowerdata.fromJson(json);
      }).toList();
 
      return listOfFruits;
      }
     else {
      throw Exception('Failed to load data from Server.');
    }
  }
 
  selectedItem(BuildContext context, String holder) {
    showDialog(
    context: context,
    builder: (BuildContext context) {
      return AlertDialog(
        title: new Text(holder),
        actions: <Widget>[
          FlatButton(
            child: new Text("OK"),
            onPressed: () {
              Navigator.of(context).pop();
            },
          ),
        ],
      );
     },
    );
  }
 
  @override
  Widget build(BuildContext context) {
    return FutureBuilder<List<Flowerdata>>(
        future: fetchFlowers(),
        builder: (context, snapshot) {
 
          if (!snapshot.hasData) return Center(
            child: CircularProgressIndicator()
            );
 
          return ListView(
            children: snapshot.data
                .map((data) => Column(children: <Widget>[
                  GestureDetector(
                    onTap: (){selectedItem(context, data.isi);},
                    child: Row(
                    children: [
                      Container(
                      width: 200, 
                      height: 100,
                      margin: EdgeInsets.fromLTRB(10, 0, 10, 0),
                      child: ClipRRect(
                      borderRadius: BorderRadius.circular(8.0),
                      child:
                        Image.network("http://192.168.1.6/kentangtech/backend/pages/forms/images/"))),
                       
                       Flexible(child:
                        Text(data.judul, 
                            style: TextStyle(fontSize: 18)))
                      ]),),
 
                      Divider(color: Colors.black),
 
                     ],))
                .toList(),
          );
        },
    );
  }
}