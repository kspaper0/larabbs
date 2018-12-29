<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class Policy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        // 如果用户拥有管理内容的权限的话，即授权通过
        if ($user->can('manage_contents')) {
            return true;
        }

        //当此处未定义方法时，会先找寻TopicPolicy此方法的内容
        //即，只有当前用户才能更改或删除自己的贴子
        //此处，当权限为'manage_contents'后，由于返回的一直是 true
        //将忽略其他的判断
    }
}