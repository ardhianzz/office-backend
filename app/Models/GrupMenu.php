<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Master\User;
use App\Models\UserGroup;
use App\Models\Group;
use App\Models\Menu;
use App\Models\HeadMenu;

class GrupMenu extends Model
{
    use SoftDeletes;

    protected $table = 'grup_menu';
    protected $connection = 'sys';
    protected $fillable = [
        'id_grup',
        'id_menu',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function menu()
    {
    	return $this->belongsTo('App\Models\Menu', 'id_menu');
    }

    public function grup()
    {
    	return $this->belongsTo('App\Models\Grup', 'id_grup');
    }

    // public static function get_menu_html($group_id)
	// {
    //     $menu_html = '';
    //     $daftar_head_menu = HeadMenu::where('is_enable', true)->orderBy('nomor_urut')->get(['id', 'nama']);
    //     foreach ($daftar_head_menu as $head_menu) {
    //         if (isset($head_menu->nama)) $menu_html .= '<li class="kt-menu__section "><h4 class="kt-menu__section-text">'.$head_menu->nama.'</h4><i class="kt-menu__section-icon flaticon-more-v2"></i></li>';
    //
    //         $menu_html .= self::get_group_menu_html($group_id, $head_menu->id);
    //     }
    //
	// 	return $menu_html;
	// }
    //
    // public static function get_group_menu_html($group_id, $head_menu_id, $level = 0, $parent_id = NULL)
    // {
    //     $level++;
    //
    //     $menu_html = '';
    //     $daftar_id_first_level_menu = array_column(
    //         Menu::select('id')
    //             ->where('head_menu_id', $head_menu_id)
    //             ->where('parent_id', $parent_id)
    //             ->where('level', $level)
    //             ->orderBy('nomor_urut')
    //             ->get()
    //             ->toArray(), 'id'
    //     );
    //
    //     if(!empty($daftar_id_first_level_menu)) {
    //         $daftar_group_menu = GroupMenu::where('group_id', $group_id)
    //             ->whereIn('menu_id', $daftar_id_first_level_menu)
    //             ->get(['group_id', 'menu_id']);
    //
    //         if($daftar_group_menu->count() > 0) {
    //             foreach ($daftar_group_menu as $group_menu) {
    //                 $menu = Menu::findOrFail($group_menu->menu_id);
    //
    //                 $child_menu = Menu::where('parent_id', $menu->id)
    //                     ->where('level', $menu->level + 1)
    //                     ->first(['id']);
    //
    //                 // dd($child_menu);
    //
    //                 $menu_icon = '';
    //                 if ($menu->level == 1) $menu_icon = 'kt-menu__link-icon ' . $menu->icon;
    //                 else $menu_icon = 'kt-menu__link-bullet kt-menu__link-bullet--line';
    //
    //                 if ($child_menu) {
    //                     $menu_html .= '<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="'.$menu_icon.'"></i><span class="kt-menu__link-text">'.$menu->nama.'</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>';
    //                     $menu_html .= '<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>';
    //                     $menu_html .= '<ul class="kt-menu__subnav">';
    //                     if ($menu->level == 1) $menu_html .= '<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">'.$menu->nama.'</span></span></li>';
    //                     $menu_html .= self::get_group_menu_html($group_id, $head_menu_id, $level, $menu->id);
    //                     if ($menu->level == 1) $menu_html .= '</li>';
    //                     $menu_html .= '</ul>';
    //                     $menu_html .= '</div>';
    //                     $menu_html .= '</li>';
    //                 } else {
    //                     $menu_html .= '<li class="kt-menu__item" aria-haspopup="true"><a href="'.url($menu->route).'" class="kt-menu__link "><i class="'.$menu_icon.'"></i><span class="kt-menu__link-text">'.$menu->nama.'</span></a></li>';
    //                 }
    //             }
    //         }
    //     }
    //
    //     return $menu_html;
    // }
}
