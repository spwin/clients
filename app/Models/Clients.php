<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'web', 'email', 'phone', 'person', 'comments',
        'status_quote_sent', 'status_got_reply', 'status_collaboration', 'status_friend',
        'rate_website', 'rate_performance', 'rate_design', 'rate_mobile',
        'rate_seo', 'rate_multilingual', 'rate_social', 'rate_budget', 'rate_trusted'
    ];

    public function score(){
	$max = 132;
	$web = 2*(4-$this->rate_performace) + 2*(4-$this->rate_design) + 2*(4-$this->rate_mobile) + 3*(4-$this->rate_seo) + (4-$this->rate_multilingual) + 2*(4-$this->rate_social) + 3*(4-$this->rate_website) + 1;
	$web = $this->rate_website == 0 ? 61 : $web;
	$bt = ($this->rate_budget + $this->rate_trusted)/8 + 1;
	$friend = $this->status_friend ? 5 : 0;
	$percentage = ((($web + $friend) * $bt)/$max) * 100;
	return round($percentage,2);
    }
}
