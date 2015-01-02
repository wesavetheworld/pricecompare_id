<ul class="nav nav-pills">
    <li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
        <a href="<?php echo site_url(SITE_AREA . '/crawler/unclustered_data') ?>" id="list"><?php echo lang('unclustered_data_list'); ?></a>
    </li>
    <li <?php echo $this->uri->segment(4) == 'crawl' ? 'class="active"' : '' ?> >
        <a href="<?php echo site_url(SITE_AREA . '/crawler/unclustered_data/crawl') ?>" id="crawl">Data Crawling</a>
    </li>
    <?php if ($this->auth->has_permission('Unclustered_Data.Crawler.Create')) : ?>
        <li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
            <a href="<?php echo site_url(SITE_AREA . '/crawler/unclustered_data/create') ?>" id="create_new"><?php echo lang('unclustered_data_new'); ?></a>
        </li>
    <?php endif; ?>
</ul>