<?php
echo '<h1>'.$video_item['title'].'</h1>';
echo '<div class="embed-responsive embed-responsive-16by9">';
echo '<iframe class="embed-responsive-item" src='.$video_item['link'].' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
echo '</div>';
echo '<p><a href='.$video_item['link'].'>'.$video_item['title'].'</a> from <a href="https://vimeo.com/goveryogle">people</a> on <a href="https://vimeo.com">Vimeo</a>.</p>';
echo '<p>'.$video_item['text'].'</p>';
