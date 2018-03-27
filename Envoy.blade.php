@servers(['web' => 'ponchito@11.11.2.30'])

@task('foo', ['on' => 'web'])
    php artisan serve
@endtask
