@extends('user.layouts.page')

@section('title', '| Contact')

@section('header')
<style>
    .header {
        background-color: #ee6e73;
    }
</style>
@endsection

@section('content')
<div class="content top-margin">
    <div class="wrapper" id="">
        <div class="head center"><h1>CONTACT US</h1></div>
        <div id="content">
            <div>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i> 
                    NFCS University of Ilorin Secretariat<br>
                    &nbsp&nbsp&nbspST THOMAS AQUINAS' CHAPLAINCY (STAC)<br>
                    &nbsp&nbsp&nbspMian Campus,<br>
                    &nbsp&nbsp&nbspP.M.B. 1515,<br>
                    &nbsp&nbsp&nbspUniversity of Ilorin,<br>
                    &nbsp&nbsp&nbspIlorin,<br>
                    &nbsp&nbsp&nbspKwara State.
                </p>
                <p><i class="fa fa-mobile" aria-hidden="true"></i><a href="#"> 08032985995</a></p>
                <p><i class="fa fa-envelope-o" aria-hidden="true"></i> nfcsunilorinchapter@gmail.com</p>
            </div>
            <div class="">
                <h1 class="center">Email Us</h1>
                <!-- <div> -->
                    <form class="" action="">
                        <div class="row">
                           <div class="input1">
                                <label class="label">Name: </label>
                                <input class="input" type="text" name="name" placeholder="Enter your name"/>
                           </div>
                        </div>
                        <div class="row">
                           <div class="input1">
                                <label class="label">Email: &nbsp</label>
                                <input class="input" type="email" name="name" placeholder="Enter your email"/>
                           </div>
                        </div>
                        <div class="row">
                            <div class="input1">
                                <label class="label">Message: </label>
                                <textarea class="input" type="text" name="subscribe" placeholder="Enter your details"></textarea>
                            </div>
                        </div>
                        <div class="center">
                            <button class="formButton" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
               <!--  </div> -->
            </div>
        </div>
    </div>
</div>
@endsection