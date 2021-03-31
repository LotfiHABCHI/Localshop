@extends('layouts.base')

@section('title')
{{$cat[0]->categoryname}}
@endsection

@section('css')
  @parent
  <link href="{{ asset('css/product/category.css') }}" rel="stylesheet" type="text/css" />
@endsection

<style>
  .category{
    display : inline-block;
  }
  .products{
    text-align: center;
    
  }
  .product-card {
   
    display: inline-block;
      width: 250px;
      position: relative;
      box-shadow: 0 2px 7px #dfdfdf;
      margin: 50px auto;
      background: #fafafa;
      text-align: center;
  }
  
  .badge {
      position: absolute;
      left: 0;
      top: 30px;
      text-transform: uppercase;
      font-size: 13px;
      font-weight: 700;
      background: green;
      color: #fff;
      padding: 3px 10px;
  }
  .product-card{
    border-radius: 25px;
    margin : 5px;
  }
  
  .product-tumb {
      border-radius : 25px 25px 0px 0px;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 250px;
     /* padding: 1px;*/
      background: #f0f0f0;
  }
  
  .product-tumb img {
    
      max-width: 100%;
      max-height: 100%;
  }
  
  .product-details {
      padding: 30px;
  }
  
  .product-catagory {
      display: block;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      color: #ccc;
      margin-bottom: 18px;
  }
  
  .product-details h4 a {
      font-weight: 500;
      display: block;
      margin-bottom: 18px;
      text-transform: uppercase;
      color: #363636;
      text-decoration: none;
      transition: 0.3s;
  }
  
  .product-details h4 a:hover {
      color: #fbb72c;
  }
  
  .product-details p {
      font-size: 15px;
      line-height: 22px;
      margin-bottom: 18px;
      color: #999;
  }
  
  .product-bottom-details {
      overflow: hidden;
      border-top: 1px solid #eee;
      padding-top: 20px;
      text-align: center  ;
  }
  
  .product-bottom-details div {
      float: left;
      width: 50%;
      text-al;
      
  }
  
  .product-price {
      font-size: 30px;
      color: #fbb72c;
      font-weight: 400;
      text-align: center;
     
  }
  
  .product-price small {
      font-size: 80%;
      font-weight: 400;
      text-decoration: line-through;
      display: inline-block;
      margin-right: 5px;
  }
  
  .product-links {
      text-align: right;
  }
  
  .product-links a {
      display: inline-block;
      margin-left: 5px;
      color: #e1e1e1;
      transition: 0.3s;
      font-size: 17px;
  }
  
  .product-links a:hover {
      color: #fbb72c;
  }

</style>

@section('content')
<div class="category">
          <ul>
            @foreach($categories as $category)
            <li>
              <a href="{{route('showProductsOfCategory',['id'=>$category->categoryid])}}">
                <img src="{{asset('images/'.$category->categoryimage)}}">
              </a>
            </li>
            @endforeach
          </ul>
</div>
  
<div id="core_category">
  

  


<div class="products">
@foreach($products as $product)
  <div class="product-card">
  
    

      <div class="product-tumb">
          <img src="{{asset('storage/images/'.$product->productimage)}}" alt="image">
      </div>

      <div class="product-details">
          <span class="product-catagory"> <a href="{{route('product',['id'=>$product->productid, 'sellerId'=>$product->sellerid])}}"> {{ $product->productname }}</a></span>
          <h4>	<a href="{{route('showProductOfSeller',['id'=>$product->sellerid])}}">{{ $product->storename}}</a></h4>
          <p>{{ $product->productinfo }} </p>
          <div class="product-bottom-details">
              <div class="product-price">
                  {{ number_format($product->productprice,2) }}€ 
              </div>
              
          </div>
      </div>
    
  </div>
  @endforeach

</div>


  
</div>



      

@endsection