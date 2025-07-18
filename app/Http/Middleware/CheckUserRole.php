<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Vérifie que l'utilisateur a l'un des rôles requis.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roles  Liste des rôles séparés par '|', ex: 'admin|editor'
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $roles)
    {
        $user = Auth::user();
        //si l’utilisateur n’est pas connecté → on bloque avec une erreur 403.
        if (!$user) {
            abort(403, 'Accès refusé : utilisateur non authentifié.');
        }
        //Découpe les rôles autorisés :ex admin|editor
        $rolesArray = explode('|', $roles);
        //vérifie si le rôle de l’utilisateur est bien dans la liste autorisée si non il le block
        if (!in_array($user->role, $rolesArray)) {
            abort(403, 'Accès refusé : rôle insuffisant.');
        }
        //si tout est bon, on continue la requête.
        return $next($request);
    }
}
//resume : middleware  :

// il bloque les utilisateurs non connectés

// il vérifie le rôle exactement comme il faut

// il empêche d’accéder à des routes protégées sans autorisation

// il n’expose pas d’informations sensibles dans ses messages d’erreur


