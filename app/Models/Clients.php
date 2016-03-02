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
}
