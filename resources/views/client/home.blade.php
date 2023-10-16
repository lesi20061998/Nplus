@extends('client.layout.master')

@section('content')


<!-- section -->
<section class="home-contact">
   <div class="container">
      <div class="row justify-content-center">
         <div class=" col-md-12 col-md-12 col-lg-6 col-xl-7 box-contact">
            <div class="contact-title">
               <p>Nullam quis risus eget <a href="#">urna mollis ornare</a> vel eu leo. Cum sociis natoque
                  penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh
                  ultricies vehicula.</p>

            </div>
            <div class="contact-button"><button type="button" class="btn btn-outline-light">LIÊN HỆ
                  NGAY</button></div>
         </div>
      </div>
   </div>
</section>
<section class="home-slider">
   <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active" data-interval="10000">
            <img src="/asset/images/slider1.png" class="d-block w-100" alt="...">
         </div>
         <div class="carousel-item" data-interval="2000">
            <img src="/asset/images/slider1.png" class="d-block w-100" alt="...">
         </div>
         <div class="carousel-item">
            <img src="/asset/images/slider1.png" class="d-block w-100" alt="...">
         </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
      </a>
   </div>
</section>
<section class="home-about-us">
   <div class="container">
      <div class="row border-bottom mb-3 pb-3">
         <div class="col-12 d-flex align-items-center ">
            <div class="icon m-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
               </svg></div>
            <h2 class="title-section">VỀ CHÚNG TÔI</h2>
         </div>
      </div>
      <div class="row justify-content-between">
         <div class="col-xs-12 col-md-12 col-lg-5 col-xl-5 about-us-contact ">
            <div class="card-about ">
               <div class="card-about-heading">
                  <h3>Dịch vụ</h3>
               </div>
               <div class="card-about-body">
                  <p>Đầu tiên, Chúng tôi cung cấp dịch vụ tra cứu thông tin quy hoạch đô thị nhà đất trên địa
                     bàn Thành phố Hồ Chí Minh với sản phẩm là các văn bản pháp lý chính thức từ các cơ quan
                     nhà nước thực hiện chức năng quản lý theo thẩm quyền.</p>
               </div>
            </div>
            <div class="card-about ">
               <div class="card-about-heading">
                  <h3>Giải pháp</h3>
               </div>
               <div class="card-about-body">
                  <p>Ngoài ra, sau khi nhận được thông tin quy hoạch đô thị nhà đất theo nhu cầu. Chúng tôi cung cấp dịch vụ tư vấn về kết quả và đưa ra các giải pháp về quy hoạch - kiến trúc phù hợp và tốt nhất cho khách hàng.</p>
               </div>
            </div>
            <div class="card-about ">
               <div class="card-about-heading">
                  <h3>Phương châm</h3>
               </div>
               <div class="card-about-body">
                  <p>Chúng tôi thực hiện công việc của khách hàng với phương châm:  "Uy tín - Trách nhiệm - Chuyên nghiệp"</p>
               </div>
            </div>

         </div>
         <div class="col-xs-12 col-md-12 col-lg-5 col-xl-5 about-us-contact about-us-contact">
            <h3 class="title">
               Những điều bạn cần biết để sử dụng sản phẩm của chúng tôi một cách hiệu quả
            </h3>
            <div class="img-thumnail">
               <div class="row">
                  <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                     <figure>
                        <img src="/asset/images/about.png" alt="Trulli" style="width:100%">
                     </figure>
                  </div>
                  <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                     <figure>
                        <img src="/asset/images/about-2.png" alt="Trulli" style="width:100%">
                     </figure>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="home-service">
   <div class="container">
      <div class="row border-bottom mb-5 pb-3">
         <div class="col-12 d-flex align-items-center p-0">
            <div class="icon m-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
               </svg></div>
            <h2 class="title-section">SẢN PHẨM VÀ DỊCH VỤ</h2>

         </div>

      </div>

      <div class="row mb-4">
         <div class=" col-xs-12 col-md-8 col-lg-8 col-xl-8 ">
            <a href="{{route('client-service')}}">
               <figure>
                  <img src="/asset/images/service-4.png" class="img-fluid fixed-image" alt="" srcset="">
                  <figcaption>
                     <h3>THÔNG TIN QUY HOẠCH ĐÔ THI</h3>
                  </figcaption>
               </figure>
            </a>

         </div>
         <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">
            <a href="{{route('client-service')}}">
               <figure>
                  <img src="/asset/images/service-2.png" class="img-fluid fixed-image"" alt="" srcset="">
                           </figure>
                           <figcaption>
                              <h3>THÔNG TIN QUY HOẠCH ĐÔ THI</h3>
                  </figcaption>
            </a>
            </div>

         </div>
         <div class=" row">
                  <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4 ">
                     <a href="{{route('client-service')}}">
                        <figure>
                           <img src="/asset/images/service-1.png" class="img-fluid fixed-image" alt="" srcset="">
                        </figure>
                        <figcaption>
                           <h3>THÔNG TIN QUY HOẠCH ĐÔ THI</h3>
                        </figcaption>
                     </a>
                  </div>
                  <div class="col-xs-12 col-md-8 col-lg-4 col-xl-8">
                     <a href="{{route('client-service')}}">
                        <figure>
                           <img src="/asset/images/service-3.png" class="img-fluid fixed-image"" alt="" srcset="">
                           </figure>
                           <figcaption>
                              <h3>THÔNG TIN QUY HOẠCH ĐÔ THI</h3>
                  </figcaption>
            </a>
            </div>
         </div>
      </div>

   </section>
   <section class=" home-material">
                           <div class="container">
                              <div class="row border-bottom mb-5 pb-3">
                                 <div class="col-12 d-flex align-items-center p-0">
                                    <div class="icon m-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                                       </svg></div>
                                    <h2 class="title-section">VỀ CHÚNG TÔI</h2>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-xs-12 col-md-12 col-lg-4 col-xl-4 ">
                                    <div class="material-box border">
                                       <h3 class="title"> Lên lịch gặp trực tiếp với các chuyên gia</h4>
                                          <p class="description">Ornare tellus eros dignissim posuere. Et velit condimentum sed
                                             euismod in eu habitant aliquam erat. Odio enim vel faucibus sapien quam quis sit.</p>
                                          <form>
                                             <fieldset>


                                                <div class="form-group">

                                                   <input type="text" class="form-control form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên của bạn">
                                                   <input type="text" class="form-control form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                                                   <textarea class="form-control form-input" placeholder="Message" id="exampleTextarea" rows="3" style="height: 70px;"></textarea>


                                                </div>



                                                <button type="button" class="btn btn-outline-light">LIÊN HỆ
                                                   NGAY</button>
                                             </fieldset>
                                          </form>
                                    </div>
                                 </div>
                                 <div class="col-xs-12 col-md-12 col-lg-4 col-xl-4 ">
                                    <div class="material-box border">
                                       <h3 class="title"> Blog</h4>
                                          <figure>
                                             <img src="/asset/images/blog.png" class="img-fluid pb-4 pt-4" srcset="">
                                             <figcaption class="pt-3">
                                                <p>Ornare tellus eros dignissim posuere. Et velit condimentum sed euismod in eu
                                                   habitant aliquam erat. Odio enim vel faucibus sapien quam quis sitsapien quam
                                                   quis sit sapien quam quis sitsapien ...</p>
                                                <button type="button" class="mt-3 btn btn-outline-light">LIÊN HỆ
                                                   NGAY</button>
                                             </figcaption>

                                          </figure>
                                    </div>
                                 </div>
                                 <div class="col-xs-12 col-md-12 col-lg-4 col-xl-4 ">
                                    <div class="material-box border">
                                       <h3 class="title ">Fanpage</h4>
                                          <figure>
                                             <img src="/asset/images/blog.png" class="img-fluid pb-4 pt-4" srcset="">
                                             <figcaption class="pt-3">
                                                <p>Ornare tellus eros dignissim posuere. Et velit condimentum sed euismod in eu
                                                   habitant aliquam erat. Odio enim vel faucibus sapien quam quis sitsapien quam
                                                   quis sit sapien quam quis sitsapien ...</p>
                                                <button type="button" class="mt-3 btn btn-outline-light">LIÊN HỆ
                                                   NGAY</button>
                                             </figcaption>

                                          </figure>
                                    </div>
                                 </div>
                              </div>
                           </div>

</section>
<!-- section -->

@endsection