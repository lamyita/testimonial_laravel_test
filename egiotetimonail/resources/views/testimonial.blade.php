

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        

        <!-- Fonts -->

        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            
                    html, body {
                        background-color:#f3f3f3;

                        
                        color: #000000;
                        font-family: 'Roboto', sans-serif;      
                                font-weight: bolder;
                        height: 100vh;
                        margin: 0;
                    }

                    form {
                


                        background-color: rgb(255, 255, 255);
                        margin: auto auto;
                        width: 30%;
                        height: 72vh;
                        margin-top: 39px;
                        padding: 1pc 2pc 6pc 2pc;
                        text-align: start;
                        font-size: smaller;

            
                }
                textarea {
                    width: 100%;
                    height: 100px;
                    padding: 12px 20px;
                    box-sizing: border-box;
                    border: 2px solid #ccc;
                    border-radius: 4px;
                    background-color: #f3f3f3;
                    margin-top: 1pc;
                    /* resize: none; */
                    }
            
                input{
                
                    width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                background-color: #f3f3f3
                }
                .img input{
                    border: none;
                    background-color: transparent;
                    

                }
            #btn__add__testimonial{
                background-color: transparent;
                /* padding: 10px; */
                color: #ec9b3f;
                border:3px solid #ec9b3f;
                font-weight: bolder;
                padding: 10px 15px;
                width: auto;
                margin-top: 2pc;
                margin-left:2pc;
                cursor: pointer;

            }
                    .formfileds{
                        margin: auto auto;
                    }
                    .section__Testimonials{
                            display: flex;
                            flex-wrap: wrap;
                            align-content: flex-start;
                            justify-content: space-around;
                            padding: 4px;
                            text-align: center;
                            max-width: 80%;
                            margin: auto
                    }
                    .section__Testimonials img{

                        border-radius: 50%;
                        width: 150px;
                        height: 150px;

                    }
                    p{
                                font-size: 13px;
                                font-weight: 300;
                    }

            .error__msg{
                text-align: center;
                    color: white;
                    font-weight: 400;
                    margin-top: -13px;
                    background-color: darkred;
                padding: 5px;
            }
            .alert-success{
                color: white;
                text-align: center;
                background-color: darkseagreen;
                    padding: 1px;
            }

            .title__section__Testimonials{
                text-align: center;
                margin-top: 6pc;
                font-size: 38px;
                font-family: 'Roboto', sans-serif;

            }

            .rectangle{
                background-color: #fcfcfc;
                padding: 12px;
            }

        

       
       
        </style>


{{-- /////////***************///end style///**************************************///:/// --}}
    </head>
    <body>
       

            <div class="content">
       
             
                        <form method="post" action="{{ url('testimonial/insert_data') }}"  enctype="multipart/form-data">
                            {{--****************error messages ******************************* --}}
                                    @if($errors->any())
                                    <div class="alert-danger">
                                        @foreach($errors->all() as $error)
                                            <p class="error__msg">{{ $error }}</p>
                                        @endforeach
                                     </div>
                                    @endif
                            
                                    @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        <p>  {{ session()->get('success') }} </p>
                                    </div>
                                    @endif
                                <br />

                                {{-- *******Cross-site request forgeries *** (token)  ****************--}}
                                @csrf
                                <div class="formfileds">
                                    <div class="form-group">
                                            <label for="title">TITRE *</label></br>

                                         <input type="text" class="form-control" id="title" name="title"  >
                              
                                     </div>

                           
                           
                                     <div class="img" class="form-group">
                                        <label for="exampleFormControlFile1">IMAGE</label><br>
                                        <input  name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>

                                    <div class="form-group">
                                        <label for="message"> MESSAGE *</label><br>
                                        <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7"></textarea>
                                     </div>

                                    <div>
                                        <input type="submit" name="testimonial" class="btn btn-primary submit" value="ADD NEW TESTIMONIAL" id="btn__add__testimonial" />

                                    </div>

                           </div>
                        </form>


                           <h2 class="title__section__Testimonials">Testimonials</h2>

                             <div class="section__Testimonials">
                                @foreach($data as $row)

                                 <div class="section__Testimonials--flex" >
                                     <div class="rectangle">
                                         <img src="testimonial/fetch_data/{{ $row->id }}"  class="img" />

                                     </div>
                                        <p>{{ $row->title }}</p>
                
                                        <p>{{ $row->message }}</p>
                
                                   </div>
                                   @endforeach

                                    
                                   
                                   
                             </div>

                    

                    
            </div>


    </body>
</html>
