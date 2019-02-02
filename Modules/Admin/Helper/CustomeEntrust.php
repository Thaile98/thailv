<?php

if(!function_exists('user'))
{
	function user($guard = 'admins')
	{
		return app()->auth->guard($guard)->user();
	}
}

if(!function_exists('getIdAdmin'))
{
	function getIdAdmin()
	{
		return user()->id;
	}
}

if(!function_exists('admin_can'))
{
	function admin_can($permission, $requireAll = false)
	{
		if (user()) 
		{
		    return user()->can($permission, $requireAll);
		}

		return false;
	}
}

if(!function_exists('admin_hasRole'))
{
	function admin_hasRole($roles, $requireAll = false)
	{
		if (user()) 
		{
		    return user()->hasRole($roles, $requireAll);
		}

		return false;
	}
}

if(!function_exists('admin_ability'))
{
	function admin_ability($roles, $permissions, $options = [])
	{
		if (user()) 
		{
            return user()->ability($roles, $permissions, $options);
        }

        return false;
	}
}