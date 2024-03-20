<?php
// Incluir archivo de conexión a la base de datos
include 'conexion.php';

// Iniciar la sesión
session_start();

// Verificar si hay una sesión activa
if (!isset($_SESSION['usuario_id'])) {
    // Si no hay una sesión activa, redirigir al usuario al formulario de inicio de sesión
    header("Location: login.php");
    exit();
}

// Resto del código de tu archivo login.php
// ...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Dashboard</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
	
	<!-- Style css -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/mio.css" rel="stylesheet">

	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
            <a href="index.html" class="brand-logo">
				<svg class="logo-abbr" width="55" height="55" viewbox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M27.5 0C12.3122 0 0 12.3122 0 27.5C0 42.6878 12.3122 55 27.5 55C42.6878 55 55 42.6878 55 27.5C55 12.3122 42.6878 0 27.5 0ZM28.0092 46H19L19.0001 34.9784L19 27.5803V24.4779C19 14.3752 24.0922 10 35.3733 10V17.5571C29.8894 17.5571 28.0092 19.4663 28.0092 24.4779V27.5803H36V34.9784H28.0092V46Z" fill="url(#paint0_linear)"></path>
					<defs>
					</defs>
				</svg>
				<div class="brand-title">
					<h2 class="">Sofmis</h2>
					<span class="brand-sub-title">Administrador</span>
				</div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		<div class="chatbox">
			<div class="chatbox-close"></div>
			<div class="custom-tab-1">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" data-bs-toggle="tab" href="#chat">Chat</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active show" id="chat" role="tabpanel">
						<div class="card mb-sm-3 mb-md-0 contacts_card dlab-chat-user-box">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"></rect><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"></rect></g></svg></a>
								<div>
									<h6 class="mb-1">Chat List</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dlab-scroll  " id="DLAB_W_Contacts_Body">
								<ul class="contacts">
									<li class="name-first-letter">A</li>
									<li class="active dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Archie Parker</span>
												<p>Kalid is online</p>
											</div>
										</div>

									</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Alfie Mason</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Oscar Weston</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="card chat dlab-chat-history-box d-none">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0);" class="dlab-chat-history-back">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"></polygon><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"></rect><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "></path></g></svg>
								</a>
								<div>
									<h6 class="mb-1">Chat with Khelesh</h6>
									<p class="mb-0 text-success">Online</p>
								</div>							
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
									<ul class="dropdown-menu dropdown-menu-end">
										<li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
										<li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</li>
										<li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
										<li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
									</ul>
								</div>
							</div>
							<div class="card-body msg_card_body dlab-scroll" id="DLAB_W_Contacts_Body3">
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										Hi, how are you samim?
										<span class="msg_time">8:40 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Hi Khalid i am good tnx how about you?
										<span class="msg_time_send">8:55 AM, Today</span>
									</div>
									<div class="img_cont_msg">
								<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
								</div>
							</div>
							<div class="card-footer type_msg">
								<div class="input-group">
									<textarea class="form-control" placeholder="Type your message..."></textarea>
									<div class="input-group-append">
										<button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="alerts" role="tabpanel">
						<div class="card mb-sm-3 mb-md-0 contacts_card">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
								<div>
									<h6 class="mb-1">Notications</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dlab-scroll" id="DLAB_W_Contacts_Body1">
								<ul class="contacts">
									<li class="name-first-letter">SEVER STATUS</li>
									<li class="active">
										<div class="d-flex bd-highlight">
											<div class="img_cont primary">KK</div>
											<div class="user_info">
												<span>David Nester Birthday</span>
												<p class="text-primary">Today</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">SOCIAL</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont success">RU</div>
											<div class="user_info">
												<span>Perfection Simplified</span>
												<p>Jame Smith commented on your status</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="card-footer"></div>
						</div>
					</div>
					<div class="tab-pane fade" id="notes">
						<div class="card mb-sm-3 mb-md-0 note_card">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"></rect><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"></rect></g></svg></a>
								<div>
									<h6 class="mb-1">Notes</h6>
									<p class="mb-0">Add New Nots</p>
								</div>
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dlab-scroll" id="DLAB_W_Contacts_Body2">
								<ul class="contacts">
									<li class="active">
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>New order placed..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Youtube, a video-sharing website..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                Dashboard
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item d-flex align-items-center">
								<div class="input-group search-area">
									<input type="text" class="form-control" placeholder="Search here...">
									<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
								</div>
							</li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link " href="javascript:void(0);">
									<svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M26.7727 10.8757C26.7043 10.6719 26.581 10.4909 26.4163 10.3528C26.2516 10.2146 26.0519 10.1247 25.8393 10.0929L18.3937 8.95535L15.0523 1.83869C14.9581 1.63826 14.8088 1.46879 14.6218 1.35008C14.4349 1.23137 14.218 1.16833 13.9965 1.16833C13.775 1.16833 13.5581 1.23137 13.3712 1.35008C13.1842 1.46879 13.0349 1.63826 12.9407 1.83869L9.59934 8.95535L2.15367 10.0929C1.9416 10.1252 1.74254 10.2154 1.57839 10.3535C1.41423 10.4916 1.29133 10.6723 1.22321 10.8757C1.15508 11.0791 1.14436 11.2974 1.19222 11.5065C1.24008 11.7156 1.34468 11.9075 1.49451 12.061L6.92067 17.6167L5.63734 25.4777C5.60232 25.6934 5.6286 25.9147 5.7132 26.1162C5.79779 26.3177 5.93729 26.4914 6.1158 26.6175C6.29432 26.7436 6.50466 26.817 6.72287 26.8294C6.94108 26.8418 7.15838 26.7926 7.35001 26.6875L14 23.0149L20.65 26.6875C20.8416 26.7935 21.0592 26.8434 21.2779 26.8316C21.4965 26.8197 21.7075 26.7466 21.8865 26.6205C22.0655 26.4944 22.2055 26.3204 22.2903 26.1186C22.3751 25.9167 22.4014 25.695 22.3662 25.4789L21.0828 17.6179L26.5055 12.061C26.6546 11.9071 26.7585 11.715 26.8056 11.5059C26.8527 11.2968 26.8413 11.0787 26.7727 10.8757Z" fill="#717579"></path>
									</svg>
										<span class="badge light text-white bg-secondary rounded-circle">76</span>
                                </a>
							</li>	
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23.3333 19.8333Z" fill="#717579"></path>
										<path d="M9.9819 24.5C10.3863 25.2088 10.971 25.7981 11.6766 26.2079C12.3823 26.6178 13.1838 26.8337 13.9999 26.8337C14.816 26.8337 15.6175 26.6178 16.3232 26.2079C17.0288 25.7981 17.6135 25.2088 18.0179 24.5H9.9819Z" fill="#717579"></path>
									</svg>
                                    <span class="badge light text-white bg-warning rounded-circle">12</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3" style="height:380px;">
										<ul class="timeline">
											<li>
												<div class="timeline-panel">
													<div class="media me-2">
														<img alt="image" width="50" src="images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-primary">
														<i class="fa fa-home"></i>
													</div>
													<div class="media-body">
														<h6 class="mb-1">Reminder : Treatment Time!</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
										</ul>
									</div>
                                    <a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a>
                                </div>
                            </li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell-link " href="javascript:void(0);">
								<svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M27.076 6.24662C26.962 5.48439 26.5787 4.78822 25.9955 4.28434C25.4123 3.78045 24.6679 3.50219 23.8971 3.5H4.10289C3.33217 3.50219 2.58775 3.78045 2.00456 4.28434C1.42137 4.78822 1.03803 5.48439 0.924011 6.24662L14 14.7079L27.076 6.24662Z" fill="#717579"></path>
									<path d="M14.4751 16.485C14.3336 16.5765 14.1686 16.6252 14 16.6252C13.8314 16.6252 13.6664 16.5765 13.5249 16.485L0.875 8.30025V21.2721C0.875926 22.1279 1.2163 22.9484 1.82145 23.5536C2.42659 24.1587 3.24707 24.4991 4.10288 24.5H23.8971C24.7529 24.4991 25.5734 24.1587 26.1786 23.5536C26.7837 22.9484 27.1241 22.1279 27.125 21.2721V8.29938L14.4751 16.485Z" fill="#717579"></path>
								</svg>
									<span class="badge light text-white bg-danger rounded-circle">76</span>
                                </a>
							</li>	
							
							
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link " href="javascript:void(0);" data-bs-toggle="dropdown">
									<svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M22.1666 5.83331H20.9999V3.49998C20.9999 3.19056 20.877 2.89381 20.6582 2.67502C20.4394 2.45623 20.1427 2.33331 19.8333 2.33331C19.5238 2.33331 19.2271 2.45623 19.0083 2.67502C18.7895 2.89381 18.6666 3.19056 18.6666 3.49998V5.83331H9.33325V3.49998C9.33325 3.19056 9.21034 2.89381 8.99154 2.67502C8.77275 2.45623 8.47601 2.33331 8.16659 2.33331C7.85717 2.33331 7.56042 2.45623 7.34163 2.67502C7.12284 2.89381 6.99992 3.19056 6.99992 3.49998V5.83331H5.83325C4.90499 5.83331 4.01476 6.20206 3.35838 6.85844C2.702 7.51482 2.33325 8.40506 2.33325 9.33331V10.5H25.6666V9.33331C25.6666 8.40506 25.2978 7.51482 24.6415 6.85844C23.9851 6.20206 23.0948 5.83331 22.1666 5.83331Z" fill="#717579"></path>
										<path d="M2.33325 22.1666C2.33325 23.0949 2.702 23.9851 3.35838 24.6415C4.01476 25.2979 4.90499 25.6666 5.83325 25.6666H22.1666C23.0948 25.6666 23.9851 25.2979 24.6415 24.6415C25.2978 23.9851 25.6666 23.0949 25.6666 22.1666V12.8333H2.33325V22.1666Z" fill="#717579"></path>
									</svg>
									<span class="badge light text-white bg-success rounded-circle">!</span>
                                </a>
								<div class="dropdown-menu dropdown-menu-end">
									<div id="DZ_W_TimeLine02" class="widget-timeline dlab-scroll style-1 ps ps--active-y p-3 height370">
										<ul class="timeline">
											<li>
												<div class="timeline-badge primary"></div>
												<a class="timeline-panel text-muted" href="javascript:void(0);">
													<span>10 minutes ago</span>
													<h6 class="mb-0">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge info">
												</div>
												<a class="timeline-panel text-muted" href="javascript:void(0);">
													<span>20 minutes ago</span>
													<h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
													<p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...</p>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown  header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<img src="images/logo.png" width="56" alt="">
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="" class="dropdown-item ai-icon">
										<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
											<circle cx="12" cy="7" r="4"></circle>
										</svg>
										<span class="ms-2">Perfil</span>
									</a>
									<a href="" class="dropdown-item ai-icon">
										<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
											<polyline points="22,6 12,13 2,6"></polyline>
										</svg>
										<span class="ms-2">Inbox</span>
									</a>
									<a href="cerrar_session.php" class="dropdown-item ai-icon">
										<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
											<polyline points="16 17 21 12 16 7"></polyline>
											<line x1="21" y1="12" x2="9" y2="12"></line>
										</svg>
									</a>
								</div>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="dashboard_admin.php">Dashboard</a></li>
						</ul>

                    </li>
					
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
						<i class="fas fa-info-circle"></i>
							<span class="nav-text">Ventas</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="ventas.php">Ventas</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-chart-line"></i>
							<span class="nav-text">Compras</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="proveedores.php">Proveedores</a></li>
                            <li><a href="proveedores_eliminados.php">Proveedores Inactivos</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fab fa-bootstrap"></i>
							<span class="nav-text">Inventario</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="inventario.php">Productos</a></li>
                            <li><a href="inventario_inactivo.php">Productos Elimnados</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-heart"></i>
							<span class="nav-text">Reportes</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="reportes.php">Reportes</a></li>

                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-file-alt"></i>
							<span class="nav-text">Usuarios</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="usuarios.php">Cuentas Habilitadas</a></li>
                            <li><a href="usuarios_inavilitados.php">Cuentas Inabiltiadas</a></li>
                            <li><a href="usuarios_inavilitados.php">Clientes</a></li>
                        </ul>
                    </li>				
				<div class="copyright">
					<p><strong>GAES 3 </strong> © 2024 SENA</p>
					<p class="fs-12">Hecho por <span class="heart"></span>#3</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">

                <div class="row page-titles">
                    <div class="diseño_titulos">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Ventas</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
                        </ol>
                        <button type="button" class="btn btn-rounded btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"><span class="btn-icon-start text-primary"><i class="fa fa-shopping-cart"></i></span>Nueva Venta</button>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Realizar venta</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="agregar_venta.php" method="post">
                                                    <div class="row">
                                                        <div class="col-lg-4 order-lg-2 mb-4">
                                                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                                                <span class="text-muted">Carrito</span>
                                                                <span class="badge badge-primary badge-pill" id="contador-productos-seleccionados">0</span>
                                                            </h4>
                                                            <ul class="list-group mb-3" id="productos-seleccionados">
                                                                <!-- Aquí se mostrarán los productos seleccionados -->
                                                            </ul>
                                                            <li class="list-group-item d-flex justify-content-between">
                                                                <span>Total (COL)</span>
                                                                <strong id="total-colombiano">$0</strong>
                                                                <input type="hidden" id="total_venta" name="total_venta" value="0">
                                                            </li>
                                                        </div>
                                                        <div class="col-lg-8 order-lg-1">
                                                            <h4 class="mb-3">Registrar</h4>
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="Nombre" class="form-label">Nombre</label>
                                                                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="" value="" required="">
                                                                    <div class="invalid-feedback">
                                                                        Se requiere un nombre válido
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="Identificacion" class="form-label">Número identificación</label>
                                                                    <input type="number" class="form-control" id="Identificacion" name="Identificacion" placeholder="" value="" required="">
                                                                    <div class="invalid-feedback">
                                                                        Número inválido
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Correo electrónico</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">@</span>
                                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" required>
                                                                    <div class="invalid-feedback" style="width: 100%;">Correo inválido</div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            // Consulta para obtener todos los productos
                                                            $query = "SELECT * FROM productos";
                                                            $resultado = mysqli_query($conexion, $query);
                                                            $productos = array();

                                                            // Obtener todos los productos y almacenarlos en un array
                                                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                                                $productos[] = $fila;
                                                            }
                                                            ?>
                                                            <div class="form-group">
                                                                <label class="form-label" for="buscarProducto">Buscar Producto</label>
                                                                <input type="text" class="form-control" id="buscarProducto" placeholder="Buscar Producto...">
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="form-label" for="product-list">Lista de Productos</label>
                                                                <select class="mostrar_productos" id="product-list" name="product-list" size="5" style="margin-bottom: 10px;">
                                                                    <?php
                                                                    // Consulta para obtener solo los productos que no han sido eliminados
                                                                    $query = "SELECT * FROM productos WHERE eliminacion = 'No'";
                                                                    $resultado = mysqli_query($conexion, $query);

                                                                    // Obtener todos los productos y almacenarlos en un array
                                                                    while ($producto = mysqli_fetch_assoc($resultado)) :
                                                                    ?>
                                                                        <option value="<?php echo $producto['id']; ?>" data-stock="<?php echo $producto['stock']; ?>" data-precio="<?php echo $producto['precio']; ?>" data-imagen="<?php echo $producto['imagen']; ?>">
                                                                            <?php echo ucwords($producto['nombre']); ?> $ <?php echo $producto['precio']; ?>
                                                                        </option>
                                                                    <?php endwhile; ?>
                                                                </select>
                                                            </div>


                                                            <div class="alert alert-danger" role="alert" id="limite-alert" style="display: none;">
                                                                Se ha excedido el límite de productos por venta. No se puede agregar más productos.
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="form-label" for="tabla-productos">Productos Seleccionados</label>
                                                                <table class="table table-bordered" id="tabla-productos">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Producto</th>
                                                                            <th>Cantidad</th>
                                                                            <th>Stock</th>
                                                                            <th>Total x Und</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <!-- Aquí se mostrarán los productos seleccionados -->
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- Agregar este campo oculto para almacenar los productos seleccionados -->
                                                            <input type="hidden" id="productos-seleccionados" name="productos_seleccionados" value="">

                                                            <?php
                                                            // Consulta para obtener todos los productos
                                                            $query = "SELECT * FROM productos";
                                                            $resultado = mysqli_query($conexion, $query);
                                                            $productos = array();

                                                            // Obtener todos los productos y almacenarlos en un array
                                                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                                                $productos[] = $fila;
                                                            }
                                                            ?>
                                                            <h4 class="mb-3">Medio de Pago</h4>
                                                            <div class="d-block my-3">
                                                                <label for="paymentMethod">Método de Pago:</label>
                                                                <select id="paymentMethod" name="paymentMethod" required>
                                                                    <option value="efectivo">Efectivo</option>
                                                                    <option value="tarjeta">Tarjeta de Crédito</option>
                                                                    <option value="bancomovil">Banca Movil</option>
                                                                </select>
                                                            </div>
                                                            <hr class="mb-4">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Terminar Venta</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        var limiteProductosVenta = 50;
                        // Función para filtrar la lista de productos según el término de búsqueda
                        $('#buscarProducto').on('input', function() {
                            var searchTerm = $(this).val().toLowerCase();
                            $('#product-list option').each(function() {
                                var textoProducto = $(this).text().toLowerCase();
                                if (textoProducto.indexOf(searchTerm) === -1) {
                                    $(this).prop('hidden', true);
                                } else {
                                    $(this).prop('hidden', false);
                                }
                            });
                        });

                        // Función para agregar productos a la tabla cuando se seleccionan en el select
                        $('#product-list').change(function() {
                            var totalProductosSeleccionados = $('#tabla-productos tbody tr').length;

                            if (totalProductosSeleccionados >= limiteProductosVenta) {
                                $('#limite-alert').show();
                                $('#exito-alert').hide();
                                return; // Salir de la función si se excede el límite
                            }

                            var selectedOption = $(this).find(':selected');
                            var producto = selectedOption.text();
                            var productoId = selectedOption.val();
                            var productoPrecio = selectedOption.data('precio');
                            var imagenProducto = selectedOption.data('imagen');
                            var stockDisponible = selectedOption.data('stock');

                            // Verificar si el producto ya está en la tabla
                            var existeProducto = false;
                            $('#tabla-productos tbody tr').each(function() {
                                if ($(this).data('producto-id') === productoId) {
                                    existeProducto = true;
                                    return false; // Terminar el bucle
                                }
                            });

                            // Si el producto no está en la tabla, agregarlo al principio
                            if (!existeProducto) {
                                // Calcular el precio total
                                var cantidad = $(this).closest('tr').find('.cantidad').val();
                                var cantidadInicial = cantidad || 0; // Si no se ingresa una cantidad, se establece en 1 por defecto

                                // Crear la fila para el producto seleccionado en la tabla
                                var newRow = '<tr data-producto-id="' + productoId + '">' +
                                    '<td>' + producto + '</td>' +
                                    '<td><input type="number" class="form-control cantidad" id="cantidadProducto" value="' + cantidadInicial + '" min="1" max="' + stockDisponible + '"><br></td>' +
                                    '<td class="precio-unitario">' + stockDisponible + '</td>' +
                                    '<td class="precio-unitario">' + productoPrecio + '</td>' +
                                    '<td class="precio-total">' + (cantidadInicial * productoPrecio) + '</td>' + // Calcular el precio total inicial
                                    '</tr>';
                                $('#tabla-productos tbody').prepend(newRow);

                                // Actualizar el contador en la interfaz
                                $('#contador-productos-seleccionados').text($('#tabla-productos tbody tr').length);

                                // Calcular el total de la venta
                                actualizarTotalVenta();

                                // Agregar el producto seleccionado a la lista de productos
                                var hiddenInputs = '<input type="hidden" name="productos[' + productoId + '][id]" value="' + productoId + '">' +
                                    '<input type="hidden" name="productos[' + productoId + '][cantidad]" value="' + cantidadInicial + '">' +
                                    '<input type="hidden" name="productos[' + productoId + '][precio]" value="' + productoPrecio + '">';
                                $('#productos-seleccionados').append(hiddenInputs);

                                // Agregar el producto seleccionado a la lista de productos
                                var nuevoItem = '<li class="list-group-item d-flex justify-content-between lh-condensed">' +
                                    '<div>' +
                                    '<h6 class="my-0">' + producto + '</h6>' +
                                    '</div>' +
                                    '<img src="' + imagenProducto + '" class="imagen_lista_productos" alt="Imagen del Producto">' + // Agregar la imagen del producto
                                    '</li>';
                                $('#productos-seleccionados').append(nuevoItem);
                                selectedOption.remove();

                                $('#limite-alert').hide();
                                $('#exito-alert').show();
                            }
                            var totalProductos = $('#tabla-productos tbody tr').length;
                            // Actualizar el contador en la interfaz
                            $('#contador-productos-seleccionados').text(totalProductos);
                            // Calcular el total de la venta
                            actualizarTotalVenta();
                        });

                        $(document).on('input', '.cantidad', function() {
                            var cantidad = parseInt($(this).val());
                            var precioUnitario = parseFloat($(this).closest('tr').find('.precio-unitario').text());
                            var precioTotal = cantidad * precioUnitario;
                            $(this).closest('tr').find('.precio-total').text(precioTotal);
                            actualizarTotalVenta();

                            // Actualizar el valor del input oculto de cantidad
                            var productoId = $(this).closest('tr').data('producto-id');
                            $('input[name="productos[' + productoId + '][cantidad]"]').val(cantidad);
                        });
                        // Función para actualizar el valor del campo oculto con los productos seleccionados
                        function actualizarProductosSeleccionados() {
                            var productosSeleccionados = [];

                            // Recorrer todas las filas de la tabla de productos
                            $('#tabla-productos tbody tr').each(function() {
                                var productoId = $(this).data('producto-id');
                                var cantidad = $(this).find('.cantidad').val();
                                var precioUnitario = $(this).find('.precio-unitario').text();

                                // Agregar el producto a la lista de productos seleccionados
                                productosSeleccionados.push({
                                    id: productoId,
                                    cantidad: cantidad,
                                    precio: precioUnitario
                                });
                            });

                            // Actualizar el valor del campo oculto con la lista de productos seleccionados en formato JSON
                            $('#productos-seleccionados').val(JSON.stringify(productosSeleccionados));
                        }
                        // Función para eliminar productos de la tabla
                        $(document).on('click', '.eliminar-producto', function() {
                            var productoId = $(this).closest('tr').data('producto-id');
                            // Habilitar la opción del producto en el select
                            var productoNombre = $(this).closest('tr').find('td:first').text();
                            $('#product-list').append($('<option>', {
                                value: productoId,
                                text: productoNombre
                            }));
                            $(this).closest('tr').remove();

                            // Calcular el total de productos seleccionados
                            var totalProductos = $('#tabla-productos tbody tr').length;
                            // Actualizar el contador en la interfaz
                            $('#contador-productos-seleccionados').text(totalProductos);
                        });
                        // Función para actualizar la cantidad y el precio total en la lista de productos seleccionados
                        $(document).on('input', '.cantidad', function() {
                            // Calcular el total de la venta
                            actualizarTotalVenta();
                        });

                        // Función para calcular el total de la venta
                        function actualizarTotalVenta() {
                            var totalVenta = 0; // Inicializar el total de la venta 

                            // Recorrer cada fila de la tabla de productos
                            $('#tabla-productos tbody tr').each(function() {
                                var cantidad = parseInt($(this).find('.cantidad').val()); // Obtener la cantidad de productos
                                var precioUnitario = parseFloat($(this).find('.precio-unitario').text()); // Obtener el precio unitario del producto
                                var precioTotal = cantidad * precioUnitario; // Calcular el precio total del producto

                                totalVenta += precioTotal; // Sumar el precio total del producto al total de la venta
                            });

                            // Mostrar el total de la venta en la interfaz
                            $('#total_venta').val(totalVenta);
                            $('#total-colombiano').text('$' + totalVenta.toFixed(0));
                        }
                    });
                    $(document).on('input', '.cantidad', function() {
                        var cantidad = parseInt($(this).val()); // Obtener la cantidad de productos
                        var precioUnitario = parseFloat($(this).closest('tr').find('.precio-unitario').text()); // Obtener el precio unitario del producto
                        var precioTotal = cantidad * precioUnitario; // Calcular el precio total del producto

                        // Actualizar el precio total en la tabla
                        $(this).closest('tr').find('.precio-total').text(precioTotal);

                        // Calcular el total de la venta
                        actualizarTotalVenta();
                    });
                    // Llama a la función actualizarTotalVenta cuando se agrega o elimina un producto del carrito
                    $(document).on('change', '.cantidad', function() {
                        actualizarTotalVenta();
                    });

                    $(document).on('click', '.eliminar-producto', function() {
                        actualizarTotalVenta();
                    });
                </script>
                <script>
                    $(document).on('change', '.cantidad', function() {
                        var cantidadInput = $(this);
                        var cantidad = parseInt(cantidadInput.val());
                        var productoId = cantidadInput.closest('tr').data('producto-id');
                        var stockDisponible = obtenerStockDisponible(productoId);

                        if (cantidad > stockDisponible) {
                            cantidadInput.val(stockDisponible);
                            $('#error-stock').show();
                        } else {
                            $('#error-stock').hide();
                        }
                    });

                    function obtenerStockDisponible(productoId) {
                        var stockDisponible = 0; // Valor inicial
                        $.ajax({
                            url: 'obtener_stock.php', // Archivo PHP que manejará la solicitud y devolverá el stock
                            method: 'POST',
                            data: {
                                productoId: productoId
                            }, // Enviar el ID del producto al servidor
                            async: false, // Síncrono para esperar la respuesta del servidor
                            success: function(response) {
                                stockDisponible = parseInt(response); // Convertir la respuesta a un número entero
                            },
                            error: function() {
                                console.error('Error al obtener el stock del producto');
                            }
                        });
                        return stockDisponible; // Devolver el stock obtenido del servidor
                    }
                </script>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ventas Realizadas</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-sm mb-0" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Fecha</th>
                                                <th>Descripción</th>
                                                <th>Usuario</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Consulta para obtener las ventas
                                            $query_ventas = "SELECT ventas.*, clientes.nombre AS nombre_cliente, usuarios.nombre_usuario AS nombre_usuario FROM ventas 
        INNER JOIN clientes ON ventas.cliente_id = clientes.id 
        INNER JOIN usuarios ON ventas.usuario_id = usuarios.id";
                                            $resultado_ventas = mysqli_query($conexion, $query_ventas);

                                            // Verificar si hay ventas
                                            if (mysqli_num_rows($resultado_ventas) > 0) {
                                                // Iterar sobre cada venta
                                                while ($venta = mysqli_fetch_assoc($resultado_ventas)) {
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <a href=""><?php echo $venta['nombre_cliente']; ?></a>
                                                        </td>
                                                        <td><?php echo date('d/m/Y', strtotime($venta['fecha_venta'])); ?></td>
                                                        <td>
                                                            <?php
                                                            // Consulta para obtener los detalles de los productos comprados en esta venta
                                                            $query_detalles = "SELECT GROUP_CONCAT(productos.nombre SEPARATOR ', ') AS productos_comprados FROM detalle_venta
                            INNER JOIN productos ON detalle_venta.producto_id = productos.id
                            WHERE detalle_venta.venta_id = " . $venta['id'];
                                                            $resultado_detalles = mysqli_query($conexion, $query_detalles);

                                                            // Verificar si hay detalles de productos
                                                            if (mysqli_num_rows($resultado_detalles) > 0) {
                                                                // Imprimir los nombres de los productos comprados
                                                                $detalle = mysqli_fetch_assoc($resultado_detalles);
                                                                $productos_comprados = $detalle['productos_comprados'];
                                                                // Limitar el número de caracteres y mostrar en dos líneas
                                                                echo substr($productos_comprados, 0, 50) . (strlen($productos_comprados) > 50 ? '...' : '');
                                                            } else {
                                                                echo "No hay detalles de productos.";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $venta['nombre_usuario']; ?></td>
                                                        <td><?php echo $venta['total_venta']; ?></td>
                                                        <td>
                                                            <div class="dropdown text-sans-serif">
                                                                <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-<?php echo $venta['id']; ?>" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                                    <span>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-<?php echo $venta['id']; ?>">
                                                                    <div class="py-2">
                                                                        <a class="dropdown-item enviar-detalles" href="#" data-venta-id="<?php echo $venta['id']; ?>">Compartir</a>
                                                                        <a class="dropdown-item ver-detalles" href="#" data-venta-id="<?php echo $venta['id']; ?>">Ver detalles</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                // Si no hay ventas
                                                ?>
                                                <tr>
                                                    <td colspan="6">No hay ventas registradas.</td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal bd-example-modal-lg modal_ver_venta" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Venta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="detalles-venta"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Obtener todos los elementos con la clase "ver-detalles"
                var verDetallesButtons = document.querySelectorAll('.ver-detalles');

                // Iterar sobre cada botón "Ver detalles" y agregar un listener de evento
                verDetallesButtons.forEach(function(button) {
                    button.addEventListener("click", function() {
                        // Obtener el ID de la venta desde el atributo data-venta-id
                        var ventaId = this.getAttribute('data-venta-id');

                        // Enviar una solicitud AJAX a obtener_detalles_venta.php con el ID de la venta
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function() {
                            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                                // Abrir el modal y mostrar los detalles de la venta
                                var modal = document.querySelector('.modal_ver_venta .modal-body');
                                modal.innerHTML = xhr.responseText;
                                var modalInstance = new bootstrap.Modal(document.querySelector('.modal_ver_venta'));
                                modalInstance.show();
                            }
                        };
                        xhr.open("GET", "obtener_detalles_venta.php?venta_id=" + ventaId, true);
                        xhr.send();
                    });
                });
            });
        </script>


        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="emailForm" method="POST">
                            <input type="hidden" id="ventaIdInput" name="venta_id">
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="emailInput" name="email" required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="sutmit" class="btn btn-primary">Enviar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Evento para abrir el modal y obtener el ID de la venta
                var compartirBtns = document.querySelectorAll('.enviar-detalles');
                compartirBtns.forEach(function(btn) {
                    btn.addEventListener('click', function(event) {
                        var ventaId = this.getAttribute('data-venta-id');
                        document.getElementById('ventaIdInput').value = ventaId;
                        $('#exampleModalCenter').modal('show');
                    });
                });

                // Enviar correo electrónico al enviar el formulario
                document.getElementById("emailForm").addEventListener("submit", function(event) {
                    event.preventDefault(); // Prevenir el envío del formulario por defecto

                    // Obtener el correo electrónico del formulario
                    var email = document.getElementById("emailInput").value;
                    var ventaId = document.getElementById("ventaIdInput").value;

                    // Enviar correo electrónico mediante AJAX
                    $.ajax({
                        url: 'enviar_correo_detalle_venta.php', // Ruta del script PHP para enviar correo
                        type: 'POST',
                        data: {
                            email: email,
                            venta_id: ventaId
                        }, // Datos a enviar al servidor
                        success: function(response) {
                            alert(response); // Mostrar mensaje de éxito o error
                            $('#exampleModalCenter').modal('hide'); // Ocultar el modal después de enviar el correo
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText); // Mostrar detalles del error en la consola
                            alert("Error al enviar el correo electrónico. Por favor, inténtelo de nuevo más tarde."); // Mostrar mensaje de error
                        }
                    });
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Evento para descargar la venta como PDF
                var descargarBtns = document.querySelectorAll('.descargar-venta');
                descargarBtns.forEach(function(btn) {
                    btn.addEventListener('click', function(event) {
                        var ventaId = this.getAttribute('data-venta-id');

                        // Enviar solicitud AJAX para descargar el PDF
                        $.ajax({
                            url: 'generar_pdf_venta.php',
                            type: 'GET',
                            data: {
                                venta_id: ventaId
                            },
                            success: function(response) {
                                if (response.startsWith('ruta_del_pdf_generado/')) {
                                    // La respuesta es la ruta del archivo PDF generado
                                    // Descargar automáticamente el PDF
                                    var pdfUrl = response;
                                    var a = document.createElement('a');
                                    a.href = pdfUrl;
                                    a.download = 'detalles_venta.pdf';
                                    document.body.appendChild(a);
                                    a.click();
                                    document.body.removeChild(a);
                                } else {
                                    alert("Error al descargar la venta como PDF.");
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                alert("Error al descargar la venta como PDF.");
                            }
                        });
                    });
                });
            });
        </script>



        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>
    <!-- Apex Chart -->
    <script src="vendor/apexchart/apexchart.js"></script>

    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>

    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

</html>