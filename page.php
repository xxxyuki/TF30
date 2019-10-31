<?php get_header(); ?>

	<!-- content -->
	<div id="content">
		<div class="inner">

			<!-- primary -->
			<main id="primary">

               <?php if(function_exists('bcn_display')): ?>
				<!-- breadcrumb -->
				<div class="breadcrumb">
                    <?php bcn_display(); ?>
					<!-- <span property="itemListElement" typeof="ListItem">
						<a property="item" typeof="WebPage" href="/" class="home"><span property="name">ホーム</span></a>
						<meta property="position" content="1">
					</span>
					<i class="fas fa-angle-right"></i>
					<span property="itemListElement" typeof="ListItem">
						<a property="item" typeof="WebPage" href="#" class="taxonomy category"><span
								property="name">カテゴリ名</span></a>
						<meta property="position" content="2">
					</span>
					<i class="fas fa-angle-right"></i>
					<span class="post post-post current-item">記事のタイトルが入ります</span> -->
				</div><!-- /breadcrumb -->
                <?php endif; ?>
                 
                <?php
                if(have_posts()):
                while(have_posts()):
                the_post();
                ?>

				<!-- entry -->
				<article <?php post_class(array('entry')); ?>>

					<!-- entry-header -->
					<div class="entry-header">
                        <?php
                        // カテゴリー１つ目の名前を表示
                        $category =get_the_category();
                        if($category[0]) : ?>
						<div class="entry-label"><a href="<?php echo esc_url(get_category_link($category[0]->term_id)); ?>"><?php echo $category[0]->cat_name; ?></a></div><!-- /entry-item-tag -->
                        <?php endif; ?>
                        <h1 class="entry-title"><?php the_title(); ?></h1><!-- /entry-title -->

						<!-- entry-meta -->
						<div class="entry-meta">
							<time class="entry-published" datetime="<?php the_time('c'); ?>">公開日 <?php the_time('Y/n/j'); ?></time>
                            <!-- 最終更新日 -->
                            <?php if(get_the_modified_time('Y-m-d') !== get_the_time('Y-m-d')): ?>
                            <time class="entry-updated" datetime="<?php the_modified_time('c'); ?>">最終更新日 <?php the_modified_time('Y/n/j'); ?></time>
                            <?php endif; ?>
                        </div><!-- /entry-meta -->

						<!-- entry-img -->
						<div class="entry-img">
                            <?php
                            if(has_post_thumbnail()){
                                the_post_thumbnail('large');
                            }
                            ?>
							<!-- <img src="img/entry1.png" alt=""> -->
						</div><!-- /entry-img -->

					</div><!-- /entry-header -->

					<!-- entry-body -->
					<div class="entry-body">
                        <?php
                        // 本文の表示
                        the_content(); ?>
                        <?php
                        // 改ページを有効にするための記述
                        wp_link_pages(
                            array(
                                'before' => '<nav class="entry-links">',
                                'after' => '</nav>',
                                'link_before' => '',
                                'link_after' => '',
                                'next_or_number' => 'number',
                                'separator' => '',
                            )
                            );
                            ?>
						<!-- <p>
							テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
						</p>

						<div id="toc_container">
							<p class="toc_title">この記事のコンテンツ</p>
							<ul class="toc_list">
								<li><a href="#i">見出しが入ります</a>
									<ul>
										<li><a href="#">見出しが入ります</a></li>
										<li><a href="#">見出しが入ります</a></li>
									</ul>
								</li>
								<li><a href="#i">見出しが入ります</a>
									<ul>
										<li><a href="#">見出しが入ります</a></li>
										<li><a href="#">見出しが入ります</a></li>
									</ul>
								</li>
							</ul>
						</div>

						<h2>見出しが入ります</h2>
						<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<a
								href="#">テキストリンクテキストリンク</a>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
						</p>
						<h3>見出しが入ります</h3>
						<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<a
								href="#">テキストリンクテキストリンク</a>テキストテキストテキストテキストテキスト<strong>テキストボールドテキストボールド</strong>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
						</p>
						<h4>見出しが入ります</h4>
						<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<a
								href="#">テキストリンクテキストリンク</a>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
						</p>
						<h4>見出しが入ります</h4>
						<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<a
								href="#">テキストリンクテキストリンク</a>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
						</p>
						<div class="entry-btn"><a class="btn" href="">テキストテキスト</a></div>/entry-btn -->

					</div><!-- /entry-body -->

        
                  

                </article> <!-- /entry -->
                <?php
                endwhile;
                endif;
                ?>

			</main><!-- /primary -->

	       


		</div><!-- /inner -->
	</div><!-- /content -->

<?php get_footer(); ?>