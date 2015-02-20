<?php if (have_posts()): while (have_posts()): the_post();

    $widget_size = get_query_var('widget_size', 'default-value');

    echo $widget_type;

endwhile; endif; ?>