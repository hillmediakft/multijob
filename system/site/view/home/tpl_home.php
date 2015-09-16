<!-- CONTENT -->
<div id="content">
    <div class="container">
        <div id="main">

            <!-- ÜZENETEK -->
            <div class="row">
                <div class="span12">
                    <div id="feedback_message">
                        <?php $this->renderFeedbackMessages(); ?>
                    </div>
                </div>
            </div>

            <!-- SLIDER -->
            <div class="slider-wrapper">
                <div class="slider">
                    <div class="slider-inner">
                        <div class="row">
                            <div class="images span12">
                                <div class='iosSlider'>
                                    <div class='slider-content'>
                                        <?php foreach ($sliders as $value) { ?>
                                            <div class="slide">
                                                <img src="<?php echo Config::get('slider.upload_path') . $value['picture']; ?>" alt="">

                                                <div class="slider-info">
                                                    <div class="price">
                                                        <h2><?php echo $value['title']; ?></h2>
                                                        <div class="clearfix"></div>
                                                        <h3><?php echo $value['text']; ?></h3>
                                                        <a href="<?php echo (!empty($value['target_url']) || $value['target_url'] != '') ? $value['target_url'] : '#'; ?>">Tovább</a>
                                                    </div><!-- /.price -->

                                                </div><!-- /.slider-info -->
                                            </div><!-- /.slide -->
                                        <?php } ?>
                                    </div><!-- /.slider-content -->
                                </div><!-- .iosSlider -->

                                <ul class="navigation">
                                    <?php
                                    $count = count($sliders);
                                    if ($count > 0) {
                                        $i = 1;
                                        for ($i; ($count + 1) > $i; $i++) {
                                            ?>
                                            <li <?php echo ($i == 1) ? 'class="active"' : ''; ?>><a><?php echo $i; ?></a></li>
                                        <?php
                                        }
                                    }
                                    ?>

                                    <!-- <li class="active"><a>1</a></li>
                                        <li><a>2</a></li> 
                                                                            <li><a>3</a></li> -->
                                </ul><!-- /.navigation-->
                            </div><!-- /.images -->

                        </div><!-- /.row -->
                    </div><!-- /.slider-inner -->
                </div><!-- /.slider -->
            </div><!-- /.slider-wrapper -->





            <div class="row">
                <div class="span9">

                    <h1 class="page-header">Új munkáink <a class="btn btn-secondary arrow-right pull-right" href="<?php echo BASE_URL; ?>munkak">Megnézem az összes munkát</a></h1>

                    <div class="properties-grid">
                        <div class="row">

<?php foreach ($latest_jobs as $value) { ?>
                                <div class="property span3">
                                    <div class="image">
                                        <div class="content">
                                            <a href="munka/<?php echo Replacer::filterName($value['job_title']); ?>/<?php echo $value['job_id']; ?>"></a>
                                            <img src="<?php echo Config::get('jobphoto.upload_path') . $value['job_list_photo']; ?>" alt="">
                                        </div><!-- /.content -->

                                        <div class="price"><?php echo $value['job_pay']; ?></div><!-- /.price -->
                                        <div class="reduced"><?php echo $value['job_list_name']; ?></div><!-- /.reduced -->
                                    </div><!-- /.image -->

                                    <div class="title">
                                        <h2><a href="munka/<?php echo Replacer::filterName($value['job_title']); ?>/<?php echo $value['job_id']; ?>"><?php echo $value['job_title']; ?></a></h2>
                                    </div><!-- /.title -->

                                    <div class="location">
                                        <?php
                                        $location = $value['city_name'];
                                        if (!empty($value['district_name'])) {
                                            $location .=', ' . $value['district_name'] . ' kerület';
                                        }
                                        echo $location;
                                        ?>
                                    </div><!-- /.location -->
                                </div><!-- /.property -->
<?php } ?>


                        </div><!-- /.row -->
                    </div><!-- /.properties-grid -->


                </div>
                <div class="sidebar span3">
<?php include('system/site/view/_template/tpl_sidebar.php'); ?>                  
                </div>
            </div>

        </div>
    </div>

    <div class="bottom-wrapper">
        <div class="bottom container">
            <div class="bottom-inner row">
                
                
<?php echo $content['page_body']; ?>
                
                
            </div><!-- /.bottom-inner -->
        </div><!-- /.bottom -->
    </div><!-- /.bottom-wrapper -->    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->
