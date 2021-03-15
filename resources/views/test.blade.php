<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Accueil</title>


    <link href="{{asset('resources/css/style.css')}}" rel="stylesheet" type="text/css">

  <style>

body{
    font-family: Arial, Helvetica, sans-serif;
    font-style: normal;
    background-image: url("test2.jpg");
  }
  
  .header{
    display: flex;
    width: 100%;
  }
  
  #co{
    padding:2%;
    float: left;
    display: flex;
  }
  
  #panier{
    padding:2%;
    float: right;
    display: flex;
  }
  
  #logo img{
    text-align: center;
  }
  
  #logo{
    margin-left: 24.2%;
    display: flex;
    text-align: center;
  }
  
  hr{
    width:100%;
    color: rgb(57, 58, 58);
  }
  
  
  .core{
    height: 70%;
    padding: 9%;
  }
  
  #text{
    margin-left: auto;
    margin-right: auto;
  }
  
  #click{
    text-align: center;
    font-size: 40px;
    font-style: bold ;
    color: rgb(57, 58, 58);
  }
  
  #below_click{
    text-align: center;
    font-size: 30px;
    font-style: bold ;
    color: rgb(57, 58, 58);
  }
  
  #input{
    text-align: center; 
    cursor: pointer; 
  }
  
  #valid{
    border-color: #B9863A;
    background-color: #B9863A;
  }
  
  
  .footer{
    display: flex;
  }
  
  #propos, #faq, #mention, #contact, #cci{
    padding-left: 5%;
    display: inline-block;
  }
  
  #cci{
    color: rgb(57, 58, 58);
  }
  
  a {
    outline: none;
    text-decoration: none;
    padding: 2px 1px 0;
  }
  
  .footer a:link {
    color: rgb(108, 115, 116);
  }
  
  .footer a:visited {
    color: rgb(108, 115, 116);
  }
  
  .footer a:focus {
    border-bottom: 1px solid;
    background: rgb(57, 58, 58);
  }
  
  .footer a:hover {
    border-bottom: 1px solid;
    background: rgba(119, 126, 127, 0.452);
  }
  
  .footer a:active {
    background: rgb(57, 58, 58);
    color:rgba(119, 126, 127, 0.452);
  }

  
  
  </style>

    
  </head>
  
  <body>

    <form action="test" method="POST">
    @csrf
    <input type="text" name="people">
    <input type="password" name="password">
    <button type="submit"> valider </button>
    </form>

  </body>
</html>