import 'package:carousel_pro/carousel_pro.dart';
import 'package:flutter/material.dart';
import 'package:the_basics/LandingPage/landingpage.dart';
import 'package:the_basics/Navbar/Navbar.dart';
import 'package:the_basics/BottomBar/BottomBar.dart';



void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Kentang Tech Media',
      theme: ThemeData(primarySwatch: Colors.blue, fontFamily: "Momcake"),
      home: MyHomePage(),
    );
  }
}

class MyHomePage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      resizeToAvoidBottomPadding: false,
      body: Container(
        decoration: BoxDecoration(
            gradient: LinearGradient(
                begin: Alignment.centerLeft,
                end: Alignment.centerRight,
                colors: [
              Color.fromRGBO(4, 38, 89, 1.0),
              Color.fromRGBO(0, 0, 0, 1.0)
            ])),
        child: SingleChildScrollView(
          child: Column(
            children: <Widget>[
              Navbar(),
              Container(
                height: 750,
                child: Carousel(
                  autoplay: true,
                  indicatorBgPadding: 2.0,
                  images: [
                    AssetImage('images/kentang.png'),
                    AssetImage('images/kentang2.png'),
                  ],
                ),
              ),
              Padding(
                padding: const EdgeInsets.symmetric(
                    vertical: 20.0, horizontal: 40.0),
                child: LandingPage(),
            
              ),
              Container(
                child: Divider(color: Colors.black, height: 36),
              ),
              BottomBar()
            ],
          ),
        ),
      ),
    );
  }
}
