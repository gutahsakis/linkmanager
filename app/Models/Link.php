<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends Model
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory;

    protected $guarded = [] ;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function moveup()
    {
        $this->move(-1);
    
    }

    public function moveDown()
    {
        $this->move(+1);
    }



    /**
     * @param int $to +1 moving down and -1 for moving up
     * @return void
     */

    private function move($to)
    {

        //=1 ou -1

        $order = $this->sort;
        $newOrder = $order + $to;

       
       $swapWith = $this->user->links()->where ('sort', '=', $newOrder)->first();

        $this->fill(['sort' =>$newOrder])->save();
        $swapWith->fill(['sort' =>$order])->save();

    }

}
