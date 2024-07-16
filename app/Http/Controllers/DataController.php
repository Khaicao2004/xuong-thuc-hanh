<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Image;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index(){
        //Lấy tất cả các bình luận của một bài viết cụ thể theo kiểu chỏ sang relation: 
        $comments = Article::query()->where('id',2)->first()->comments ;

       // Lấy tất cả các đánh giá của một video cụ thể  theo kiểu chỏ sang relation:  

        $ratings = Video::query()->where('id',1)->first()->ratings;

      // Lấy tất cả các bình luận của một người dùng cụ thể (có thể dùng join or sử dụng relation)
        $comments = User::query()->where('id',2)->first()->comments;
      //Lấy trung bình đánh giá của một bài viết cụ thể. Gợi ý: $article->ratings()->avg('rating')

        $averageRating = Article::find(2)->ratings()->avg('rating');

      //Lấy tất cả các bài viết, video, và hình ảnh được bình luận bởi một người dùng cụ thể
       $commentUser = User::find(2)->comments;
       $commentCollection = collect($commentUser);

       // lấy tất cả bài viết có user là 2
       $articles = $commentCollection->filter(function($comment) {
        return $comment->commentable_type == 'App\Models\Article';  
      });
      // lấy tất cả video có user là 2
      $videos = $commentCollection->filter(function($comment) {
        return $comment->commentable_type == 'App\Models\Video';  
      });
        // lấy tất cả image có user là 2
        $images = $commentCollection->filter(function($comment) {
          return $comment->commentable_type == 'App\Models\Image';  
        });
      // Lấy danh sách các bài viết, video, và hình ảnh có đánh giá trung bình cao nhất. 
      // Gợi ý:  $topRatedArticles = Article::with(['ratings' => function($query) { 
      // $query->select(DB::raw('rateable_id, AVG(rating) as average_rating')) 
      // ->groupBy('rateable_id') 
      // ->orderBy('average_rating', 'desc') 
      // ->take(5); 
      // }])
      // ->get();

      // bài viết có lượt đánh giá trung bình cao nhất
      $topRatedArticles = Article::with(['ratings' => function($query){
        $query->select(DB::raw('rateable_id, AVG(rating) as average_rating'))
        ->groupBy('rateable_id')
        ->orderBy('average_rating','desc');
      }])->get();

       // video có lượt đánh giá trung bình cao nhất
       $topRatedVideos = Video::with(['ratings' => function($query){
        $query->select(DB::raw('rateable_id, AVG(rating) as average_rating'))
        ->groupBy('rateable_id')
        ->orderBy('average_rating','desc');
      }])->get();

      // image có lượt đánh giá trung bình cao nhất
       $topRatedImages = Image::with(['ratings' => function($query){
        $query->select(DB::raw('rateable_id, AVG(rating) as average_rating'))
        ->groupBy('rateable_id')
        ->orderBy('average_rating','desc');
      }])->get();
        dd($topRatedImages->toArray());
        
    }
}
