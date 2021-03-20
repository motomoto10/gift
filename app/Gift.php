<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    
    protected $fillable = ['gift','relation','anniversary','gender','old','price','day','explain'];
    
    static $relation = [
        '父', '母','夫', '妻','兄','弟','姉','妹','祖父','祖母','友人','恋人','上司','部下','同僚','得意先','不明'
    ];
    
    static $genders = [
    '男', '女','その他','不明'
    ];
    
    static $old = [
        '10歳以下','10代','20代','30代','40代','50代','60代','70代','80代','90歳以上','不明'
    ];
    
    static $anniversaries = [
        '誕生日', '結婚記念日','出産祝い','開店祝い','卒業祝い','入学祝い','クリスマス','バレンタイン','ホワイトデー','その他','不明'
    ];
    static $prices = [
        '1000円以下','1000~3000円', '3000~5000円','5000~10000円','1万円~3万円','3万円~5万円','5万円~10万円','10万円以上','不明'
    ];
    
    protected $dates = ['day'];
    
    
        public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorite()
    {
        return $this->belongsToMany(User::class,'favorite_gift','gift_id', 'user_id')->withTimestamps();
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount(['favorite']);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    /**
    * キーワード検索
    */
    public function scopeSerachKeyword($query, $keyword = null)
    {
        if ($keyword) {
            $query
                ->where('gift', 'like', '%' . $keyword . '%')
                ->orWhere('explain', 'like', '%' . $keyword . '%')
                ->orWhere('anniversary', 'like', '%' . $keyword . '%');
        }
        return $query;
    }
    
    public function scopeGenderFilter($query, $genders = null)
    {
        if ($genders) return $query->where('gender', 'like', '%' . $genders . '%');
    }
    
    public function scopeRelationFilter($query, $relation = null)
    {
        if ($relation) return $query->where('relation', 'like', '%' . $relation . '%');
    }
    public function scopeAnniversariesFilter($query, $anniversaries = null)
    {
        if (isset($params['anniversaries']) && is_array($params['anniversaries'])) {
        $anniversaries = implode( $params["anniversaries"]);
    
    
        if ($anniversaries) return $query->where('anniversaries', 'like', '%' . $anniversaries . '%');
    }
    }
}
