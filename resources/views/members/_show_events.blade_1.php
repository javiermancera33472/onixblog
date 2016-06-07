
                        @foreach ($events as $event)
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3>{{$event->event_name}}</h3></div>
                            <div class="panel-body">
                                <div class="col-md-12 jmPadding-10" >
                                    <?php $fileName = storage_path() . "/app/images/uploads/" . $event->event_folder .  "/thumbnails/event_thumbnail/"  . $event->event_thumbnail; ?>
                                    <?php $fileUrl  = $settings['JM_SITE_URL'] . "/image/uploads/" . $event->event_folder .  "/thumbnails/event_thumbnail/" . $event->event_thumbnail; ?>
                                    <?php if (!file_exists($fileName)) { ?>
                                    <div class="col-md-12">
                                        <div class="pull-left">
                                            <a href="#">
                                                <img src="http://placehold.it/200x200" class="thumbnail img-responsive">
                                            </a><p>Gallery</p>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#">
                                                <img src="http://placehold.it/200x200" class="thumbnail img-responsive">
                                            </a><p>Carrousell</p>
                                        </div>
                                    </div>
                                    <?php } else {?>
                                    <div class="col-md-12" style="text-align: center">
                                        <div class="pull-left">
                                            <a href="#">
                                                <img src="{{ $fileUrl . "?w=200" }}" class="thumbnail img-responsive">
                                            </a><p>Gallery</p>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#">
                                                <img src="{{ $fileUrl . "?w=200" }}" class="thumbnail img-responsive">
                                            </a><p>Carrousell</p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pull-left">
                                    <h4>{{$event->event_description}}</h4><br>
                                    <p>{{date("m-d-Y",$event->event_date)}}</p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="jmActions">
                                    <div style="margin: 10px;float:left">
                                        <a title="likes" href=""><span class="glyphicon glyphicon-thumbs-up"></span></a><span style="margin-left:5px;">{{ $event->tot_likes }}</span>
                                    </div>
                                    <div style="margin: 10px;float:left">
                                        <a title="comments" href=""><span class="glyphicon glyphicon-comment"></span></a><span style="margin-left:5px;">{{ $event->tot_comments }}</span>
                                    </div>
                                    <div style="margin: 10px;float:left">
                                        <a title="members" href=""><span class="glyphicon glyphicon-user"></span></a><span style="margin-left:5px;">{{ $event->tot_comments }}</span>
                                    </div>
                                    <div style="margin: 10px;float:right">
                                        <a title="add comments"  href="#" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-comment"></i> New Comment</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                            </div>    
                        </div>
                        @endforeach

