<?php

namespace Database\Seeders;

use App\Models\Comment\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $comment = new Comment();
        $comment->show_id = 1;
        $comment->user_name = 'John Doe';
        $comment->image = 'user-image.png';
        $comment->comment = 'This is a great show, I love it!';
        $comment->save();

        $comment = new Comment();
        $comment->show_id = 1;
        $comment->user_name = 'Jane Doe';
        $comment->image = 'user-image1.png';
        $comment->comment = 'I agree, this show is amazing!';
        $comment->save();

        $comment = new Comment();
        $comment->show_id = 2;
        $comment->user_name = 'John Doe';
        $comment->image = 'user-image.png';
        $comment->comment = 'I love this show, it is so good!';
        $comment->save();

        $comment = new Comment();
        $comment->show_id = 2;
        $comment->user_name = 'Jane Doe';
        $comment->image = 'user-image1.png';
        $comment->comment = 'I agree, this show is amazing!';
        $comment->save();
    }
}
