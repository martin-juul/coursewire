<?php

namespace App\Console\Commands;

use App\Models\Course;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a new sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = \Spatie\Sitemap\SitemapGenerator::create(config('app.url'))
            ->getSitemap();

        $this->addCourses($sitemap);

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return 0;
    }

    protected function addCourses(Sitemap $sitemap)
    {
        Course::select(['id', 'course_no', 'updated_at'])->chunk(50, function ($courses) use (&$sitemap) {
            /** @var Course $course */
            foreach ($courses as $course) {
                $sitemap->add(
                    Url::create(route('courses.show', ['courseNo' => $course->course_no]))
                        ->setLastModificationDate($course->updated_at)
                );
            }

            gc_collect_cycles();
        });
    }
}
