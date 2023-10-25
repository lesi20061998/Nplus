@extends('client.layout.master')

@section('content')


<section class="features-wrapper features-1 section-padding ">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="section-title text-center">
                    <p>Những diều cần biết</p>
                    <h1>DỊch vụ cung cấp Thông Tin quy hoạnh nhà đất trên địa bàn thành phố Hồ Chí Minh</h1>
                </div>
            </div>
        </div>
        <div class="row mt-7 mt-lg-5">
            <div class="col-xl-4 d-none d-xl-block">
                <div class="features-banner mt-30 bg-cover" style="background-image: url('/asset/images/feature_img.jpg')">
                </div>
            </div>
            <div class="col-xl-8 col-12 d-flex align-items-center">
                <div class="row">

                    <div class="col-md-12 col-12">
                        <div class="single-features-item">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-suitcase-lg-fill" viewBox="0 0 16 16">
                                    <path d="M7 0a2 2 0 0 0-2 2H1.5A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14H2a.5.5 0 0 0 1 0h10a.5.5 0 0 0 1 0h.5a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2H11a2 2 0 0 0-2-2H7ZM6 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1H6ZM3 13V3h1v10H3Zm9 0V3h1v10h-1Z" />
                                </svg>
                            </div>
                            <div class="content">
                                <h3> Văn Bảng Của Sở Quy Hoạch Trên Địa bàn thành phố HỒ CHí Minh</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="single-features-item">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                </svg>
                            </div>
                            <div class="content">
                                <h3>Thời Gian: 15 Ngày</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="single-features-item">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bank2" viewBox="0 0 16 16">
                                    <path d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916l-7.5-5zM12.375 6v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zM.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1H.5z" />
                                </svg>
                            </div>
                            <div class="content">
                                <h3>Chi Phí: 200.000 Vnđ</h3>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 col-12">
                <div class="steps">
                    <progress id="progress" value=0 max=100></progress>
                    <div class="step-item">
                        <button class="step-button text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            1
                        </button>
                        <div class="step-title">
                            Điền Thông TIn Tài liệu
                        </div>
                    </div>
                    <div class="step-item">
                        <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            2
                        </button>
                        <div class="step-title">
                            Nộp Phí tài liệu
                        </div>
                    </div>
                    <div class="step-item">
                        <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            3
                        </button>
                        <div class="step-title">
                            Nhận Tin nhắn Hồ Sơ tiếp nhận
                        </div>
                    </div>
                    <div class="step-item">
                        <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            4
                        </button>
                        <div class="step-title">
                            Nhận Thông Tin từ Đường Bưu diện
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<section class=" home-material">
    <div class="container">
        <div class="row border-bottom mb-5 pb-3">
            <div class="col-12 d-flex align-items-center p-0">
                <div class="icon m-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"></path>
                    </svg></div>
                <h2 class="title-section">Dịch vụ khác</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-4 col-xl-4 ">
                <div class="material-box border">
                    <h3 class="title"> Tư Vấn Thắc Mắc Về Thông Tin QH Kiến Trúc  </h3>
                    <figure>
                        <img src="/asset/images/service-4.png" class="img-fluid pb-4 pt-4" srcset="">
                        <figcaption class="pt-3">
                        <p class="description">Công ty NPlus chuyên tư vấn về quy hoạch kiến trúc, là đối tác đáng tin cậy của bạn trong việc giải quyết mọi thắc mắc liên quan đến lĩnh vực kiến trúc. Với đội ngũ chuyên gia giàu kinh nghiệm, chúng tôi cam kết cung cấp thông tin chi tiết và tư vấn chuyên sâu về quy hoạch kiến trúc, giúp bạn hiểu rõ các quy định, tiêu chuẩn, và quy trình thẩm định.</p>
                            <button type="button" class="mt-3 btn btn-outline-light">LIÊN HỆ
                                NGAY</button>
                        </figcaption>

                    </figure>
                    
                   
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-4 col-xl-4 ">
                <div class="material-box border">
                    <h3 class="title">Dịch Vụ Thiết Kế Kiến Trúc, Xin giấy Phép xây dựng,...</h3>
                    <figure>
                        <img src="/asset/images/service-1.png" class="img-fluid pb-4 pt-4" srcset="">
                        <figcaption class="pt-3">
                        <p class="description">Nplus: Chuyên thiết kế kiến trúc và xin giấy phép xây dựng. Với hơn 10 năm kinh nghiệm, chúng tôi mang đến các giải pháp kiến trúc sáng tạo, tuân thủ quy trình xin giấy phép, giúp biến ước mơ kiến trúc thành hiện thực NPlus - Đối tác đáng tin cậy với đội ngũ chuyên gia giàu kinh nghiệm, cam kết tư vấn và thực hiện dự án kiến trúc vượt trội, đáp ứng mọi nhu cầu của khách hàng..</p>
                            <button type="button" class="mt-3 btn btn-outline-light">LIÊN HỆ
                                NGAY</button>
                        </figcaption>

                    </figure>
                    
                   
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-4 col-xl-4 ">
                <div class="material-box border">
                    <h3 class="title">Dịch vụ hỗ trợ xin kiểm duyệt  PCC, tác động với môi trường, Đầu nối giao thong </h3>
                    <figure>
                        <img src="/asset/images/service-3.png" class="img-fluid pb-4 pt-4" srcset="">
                        <figcaption class="pt-3">
                        <p class="description">NPlus - Chuyên thiết kế kiến trúc và xin giấy phép xây dựng. Với hơn 10 năm kinh nghiệm, chúng tôi mang đến các giải pháp kiến trúc sáng tạo, tuân thủ quy trình xin giấy phép, giúp biến ước mơ kiến trúc thành hiện thực. NPlus định hình không gian sống và làm việc bằng cách kết hợp nghệ thuật và kỹ thuật, tạo ra những tác phẩm kiến trúc độc đáo.</p>
                            <button type="button" class="mt-3 btn btn-outline-light">LIÊN HỆ
                                NGAY</button>
                        </figcaption>

                    </figure>
                    
                   
                </div>
            </div>
            
        </div>
        <div class="row pt-5">
            <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center align-items-center">
                    <a href="{{route('return-payment')}}"  class="btn btn-danger">Đăng Ký Kiểm Tra Thông Tin quy hoach</a>
                </div>
        </div>
        
    </div>
   
</section>

<style>
    .section-padding{
        padding-top: 102px;
    }
    .step-button {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: none;
        background-color: var(--prm-gray);
        transition: .4s;
    }

    .features-wrapper .feature-cta {
        margin-top: 30px;
        border-radius: 7px;
        padding: 40px 60px;
        background-color: #086ad7;
    }

    .single-features-item {
        border-radius: 7px;
        background-color: #fff;
        -webkit-box-shadow: 0px 10px 60px 0px rgba(200, 226, 255, 0.45);
        box-shadow: 0px 10px 60px 0px rgba(200, 226, 255, 0.45);
        overflow: hidden;
        margin-top: 30px;
        padding: 30px 35px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        color: #000;
    }

    h3 {
        font-style: normal;
        font-weight: 700;
        font-size: 15px;
        line-height: 18px;
        color: #363636;
    }

    .single-features-item .icon {

        line-height: 1;
        color: #086ad7;
        float: left;
        overflow: hidden;
        margin-right: 25px;
    }

    .features-wrapper .features-banner {
        height: 471px;
        background-color: #eee;
        border-radius: 7px;
        width: 100%;
    }


    .section-title h1 {
        line-height: 50px;
        font-weight: 900;
        text-transform: capitalize;
    }

    .section-title p {
        color: #086ad7;
        margin-bottom: 15px;
        font-weight: 700;
        font-size: 15px;
        line-height: 1;
        text-transform: uppercase;
    }



    .steps {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        position: relative;
    }

    .step-button {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: none;
        background-color: var(--prm-gray);
        transition: .4s;
    }

    .step-button {
        width: 60px;
        height: 60px;
        background-color: #fff;
        color: #000;
    }



    .done {
        background-color: var(--prm-color);
        color: #fff;
    }

    .step-item {
        z-index: 10;
        text-align: center;
    }

    #progress {
        -webkit-appearance: none;
        position: absolute;
        width: 95%;
        z-index: 5;
        height: 10px;
        margin-left: 18px;
        margin-bottom: 18px;
    }

    .step-title {
        margin-top: 20px;
    }
</style>
@endsection