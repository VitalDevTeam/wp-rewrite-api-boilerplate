<?php if (have_posts()): while (have_posts()): the_post();

    $widget_type = get_query_var('widget_type', 'default-value');

    echo $widget_type;

endwhile; endif; ?>