@extends('layouts.layout')
@section('content')


<div class="content-wrap">  <!--START: Content Wrap-->

    <div class="row view-inbox">

        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body no-padding">

                    <div class="side-bar">  <!--START: Mail Sidebar -->

                        <div class="action">
                            <a class="btn btn-success btn-lg btn-block" href="msg-compose.php"><i class="di di-edit"></i> Compose</a>
                        </div>

                        <nav class="folders-wrapper">
                            <ul class="folders-list list-unstyled">
                                <li class="active"><a href="msg-inbox.php"><i class="sli-drawer"></i> Inbox (18)</a></li>
                                <li><a href="msg-inbox.php"><i class="sli-book-open"></i> Draft (3)</a></li>
                                <li><a href="msg-inbox.php"><i class="sli-action-redo"></i> Sent</a></li>
                                <li><a href="msg-inbox.php"><i class="sli-trash"></i> Deleted</a></li>
                            </ul>
                        </nav>

                        <div class="labels-wrapper">
                            <h4 class="sub-title">Labels</h4>
                            <ul class="labels-list list-unstyled">
                                <li><a href="javascript:;"><span class="label-color label-danger"></span> HTML5</a></li>
                                <li><a href="javascript:;"><span class="label-color label-info"></span> UI/UX</a></li>
                                <li><a href="javascript:;"><span class="label-color label-primary"></span> CSS</a></li>
                                <li><a href="javascript:;"><span class="label-color label-warning"></span> CLIE</a></li>
                            </ul>
                        </div>

                    </div>  <!-- End: Mail Side bar -->

                    <div class="content-panel">

                        <div class="content-utilities clearfix"> <!--Start: Mail Toolbar -->

                            <div class="actions">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-default"><i class="fs-spinner-4"></i></button>
                                    <button type="button" class="btn btn-default"><i class="fs-archive"></i></button>
                                    <button type="button" class="btn btn-default"><i class="fs-remove"></i></button>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false"> <span class="fs-menu-2"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Mark as read</a></li>
                                        <li><a href="#">Mark as unread</a></li>
                                        <li><a href="#">Mark as important</a></li>
                                        <li><a href="#">Mark as not important</a></li>
                                        <li><a href="#">Add to star</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="page-nav">
                                <span class="indicator">1-12 of 18</span>
                                <div class="btn-group" role="group">

                                    <button type="button" class="btn btn-default"><i class="fa fa-angle-left"></i></button>
                                    <button type="button" class="btn btn-default"><i class="fa fa-angle-right"></i></button>
                                </div>
                            </div>

                        </div>  <!-- End: Mail Tool bar -->

                        <div class="mails-wrapper"> <!-- Start: Mail List -->

                            <ul class="list-mail-item">

                                <li class="mail-item un-read">

                                    <div class="checkbox-container">
                                        <div class="checkbox checkbox-primary">
                                            <input type="checkbox" class="styled"><label></label>
                                        </div>
                                    </div>

                                    <div class="star-container"><a href="javascript:;"><i class="fa fa-star-o"></i></a></div>

                                    <div class="mail-from">
                                        <img class="hidden-xs" src="demo/users/img-user-02.jpg" alt="">
                                        Cynthianawen
                                    </div>

                                    <div class="mail-subject">
                                        <span class="subject"><a href="msg-mail-view.php">Lorem ipsum dolor noretek imit set.</a></span>
                                    </div>

                                    <div class="time-container">
                                        <span class="time">8.22 PM</span>
                                    </div>

                                </li>

                                <li class="mail-item un-read">

                                    <div class="checkbox-container">
                                        <div class="checkbox checkbox-primary">
                                            <input type="checkbox" class="styled"><label></label>
                                        </div>
                                    </div>

                                    <div class="star-container"><a href="javascript:;"><i class="fa fa-star-o"></i></a></div>

                                    <div class="mail-from">
                                        <img class="hidden-xs" src="demo/users/img-user-03.jpg" alt="">
                                        Megan Stamper
                                    </div>

                                    <div class="mail-subject">
                                        <span class="subject"><a href="msg-mail-view.php">Aldus PageMaker including versions of Lorem Ipsum.</a></span>
                                    </div>

                                    <div class="time-container">
                                        <span class="time">7.43 PM</span>
                                    </div>

                                </li>

                                <li class="mail-item un-read">

                                    <div class="checkbox-container">
                                        <div class="checkbox checkbox-primary">
                                            <input type="checkbox" class="styled"><label></label>
                                        </div>
                                    </div>

                                    <div class="star-container"><a href="javascript:;"><i class="fa fa-star-o"></i></a></div>

                                    <div class="mail-from">
                                        <img class="hidden-xs" src="demo/users/img-user-04.jpg" alt="">
                                        Alex Pushkin
                                    </div>

                                    <div class="mail-subject">
                                        <span class="subject"><a href="msg-mail-view.php">Many desktop publishing packages and web page editors.</a></span>
                                    </div>

                                    <div class="time-container">
                                        <span class="attachment-container"><i class="fa fa-paperclip"></i></span>
                                        <span class="time">4.06 PM</span>
                                    </div>

                                </li>

                                <li class="mail-item">

                                    <div class="checkbox-container">
                                        <div class="checkbox checkbox-primary">
                                            <input type="checkbox" class="styled"><label></label>
                                        </div>
                                    </div>

                                    <div class="star-container"><a href="javascript:;"><i class="fa fa-star-o"></i></a></div>

                                    <div class="mail-from">
                                        <img class="hidden-xs" src="demo/users/img-user-05.jpg" alt="">
                                        Bjarne Flur Kvistad
                                    </div>

                                    <div class="mail-subject">
                                        <span class="subject"><a href="msg-mail-view.php">There are many variations of passages of Lorem Ipsum</a></span>
                                    </div>

                                    <div class="time-container">
                                        <span class="time">12:33 pm</span>
                                    </div>

                                </li>

                                <li class="mail-item">

                                    <div class="checkbox-container">
                                        <div class="checkbox checkbox-primary">
                                            <input type="checkbox" class="styled"><label></label>
                                        </div>
                                    </div>

                                    <div class="star-container"><a href="javascript:;"><i class="fa fa-star-o"></i></a></div>

                                    <div class="mail-from">
                                        <img class="hidden-xs" src="demo/users/img-user-06.jpg" alt="">
                                        Diellza Gojani
                                    </div>

                                    <div class="mail-subject">
                                        <label class="label label-primary">
                                            <a href="#">CSS</a></label>
                                        <span class="subject"><a href="msg-mail-view.php">Lorem ipsum dolor noretek imit set.</a></span>
                                    </div>

                                    <div class="time-container">
                                        <span class="time">11:33 AM</span>
                                    </div>

                                </li>

                                <li class="mail-item">

                                    <div class="checkbox-container">
                                        <div class="checkbox checkbox-primary">
                                            <input type="checkbox" class="styled"><label></label>
                                        </div>
                                    </div>

                                    <div class="star-container"><a href="javascript:;"><i class="fa fa-star-o"></i></a></div>

                                    <div class="mail-from">
                                        <img class="hidden-xs" src="demo/users/img-user-07.jpg" alt="">
                                        Hassan Ali
                                    </div>

                                    <div class="mail-subject">
                                        <span class="subject"><a href="msg-mail-view.php">The standard chunk of Lorem Ipsum used.</a></span>
                                    </div>

                                    <div class="time-container">
                                        <span class="attachment-container"><i class="fa fa-paperclip"></i></span>
                                        <span class="time">10:02 AM</span>
                                    </div>

                                </li>

                                <li class="mail-item">

                                    <div class="checkbox-container">
                                        <div class="checkbox checkbox-primary">
                                            <input type="checkbox" class="styled"><label></label>
                                        </div>
                                    </div>

                                    <div class="star-container"><a href="javascript:;"><i class="fa fa-star-o"></i></a></div>

                                    <div class="mail-from">
                                        <img class="hidden-xs" src="demo/users/img-user-08.jpg" alt="">
                                        Vicky Mangasaryan
                                    </div>

                                    <div class="mail-subject">
                                        <span class="subject"><a href="msg-mail-view.php">Contrary to popular belief.</a></span>
                                    </div>

                                    <div class="time-container">
                                        <span class="time">09:57 AM</span>
                                    </div>

                                </li>

                                <li class="mail-item">

                                    <div class="checkbox-container">
                                        <div class="checkbox checkbox-primary">
                                            <input type="checkbox" class="styled"><label></label>
                                        </div>
                                    </div>

                                    <div class="star-container"><a href="javascript:;"><i class="fa fa-star-o"></i></a></div>

                                    <div class="mail-from">
                                        <img class="hidden-xs" src="demo/users/img-user-09.jpg" alt="">
                                        Joseph Lattimer
                                    </div>

                                    <div class="mail-subject">
                                        <span class="subject"><a href="msg-mail-view.php">New UX design class</a></span>
                                    </div>

                                    <div class="time-container">
                                        <span class="time">Nov 27</span>
                                    </div>

                                </li>

                                <li class="mail-item">

                                    <div class="checkbox-container">
                                        <div class="checkbox checkbox-primary">
                                            <input type="checkbox" class="styled"><label></label>
                                        </div>
                                    </div>

                                    <div class="star-container"><a href="javascript:;"><i class="fa fa-star-o"></i></a></div>

                                    <div class="mail-from">
                                        <img class="hidden-xs" src="demo/users/img-user-10.jpg" alt="">
                                        Colin Forsyth
                                    </div>

                                    <div class="mail-subject">
                                        <label class="label label-info">
                                            <a href="#">UX/UI</a></label>
                                        <span class="subject"><a href="msg-mail-view.php">Oor Lorem Ipsum is that it has a more-or-less normal.</a></span>
                                    </div>

                                    <div class="time-container">
                                        <span class="time">Nov 27</span>
                                    </div>

                                </li>

                                <li class="mail-item">

                                    <div class="checkbox-container">
                                        <div class="checkbox checkbox-primary">
                                            <input type="checkbox" class="styled"><label></label>
                                        </div>
                                    </div>

                                    <div class="star-container"><a href="javascript:;"><i class="fa fa-star-o"></i></a></div>

                                    <div class="mail-from">
                                        <img class="hidden-xs" src="demo/users/img-user-11.jpg" alt="">
                                        Tarek Soliman
                                    </div>

                                    <div class="mail-subject">
                                        <label class="label label-danger">
                                            <a href="#">HTML 5</a></label>
                                        <span class="subject"><a href="msg-mail-view.php">Lorem ipsum dolor noretek imit set.</a></span>
                                    </div>

                                    <div class="time-container">
                                        <span class="attachment-container"><i class="fa fa-paperclip"></i></span>
                                        <span class="time">Nov 26</span>
                                    </div>

                                </li>

                                <li class="mail-item">

                                    <div class="checkbox-container">
                                        <div class="checkbox checkbox-primary">
                                            <input type="checkbox" class="styled"><label></label>
                                        </div>
                                    </div>

                                    <div class="star-container"><a href="javascript:;"><i class="fa fa-star-o"></i></a></div>

                                    <div class="mail-from">
                                        <img class="hidden-xs" src="demo/users/img-user-12.jpg" alt="">
                                        Natalia Diaz Rodriguez
                                    </div>

                                    <div class="mail-subject">
                                        <span class="subject"><a href="msg-mail-view.php">Aldus PageMaker including versions of Lorem Ipsum.</a></span>
                                    </div>

                                    <div class="time-container">
                                        <span class="time">Nov 26</span>
                                    </div>

                                </li>

                                <li class="mail-item">

                                    <div class="checkbox-container">
                                        <div class="checkbox checkbox-primary">
                                            <input type="checkbox" class="styled"><label></label>
                                        </div>
                                    </div>

                                    <div class="star-container"><a href="javascript:;"><i class="fa fa-star-o"></i></a></div>

                                    <div class="mail-from">
                                        <img class="hidden-xs" src="demo/users/img-user-13.jpg" alt="">
                                        Jahir Fiquitiva
                                    </div>

                                    <div class="mail-subject">
                                        <label class="label label-warning">
                                            <a href="#">CLIENTS</a></label>
                                        <span class="subject"><a href="msg-mail-view.php">Lorem ipsum dolor noretek imit set.</a></span>
                                    </div>

                                    <div class="time-container">
                                        <span class="time">Nov 25</span>
                                    </div>

                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>  <!--END: Content Wrap-->

@endsection
