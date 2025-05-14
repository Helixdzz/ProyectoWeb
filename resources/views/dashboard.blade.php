@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
    <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; margin-top: 3rem;">
        @if(auth()->check())
        <p style="font-size: 1.25rem; margin-bottom: 1.5rem; color: #1f2937;">
            Bienvenido, {{ Auth::user()->name }}
        </p>
        @endif

        <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem;">
            <!-- Transportes Card -->
            <div style="border: 1px solid #e5e7eb; border-radius: 0.5rem; padding: 1.5rem; background: white;">
                <h3 style="font-weight: 500; font-size: 1.125rem; margin-bottom: 0.5rem; color: #1f2937;">Transportes</h3>
                <a href="{{ route('transportes.index') }}" 
                   style="display: inline-block; padding: 0.5rem 1rem; background: #2563eb; color: white; border-radius: 0.375rem; font-weight: 500; text-decoration: none;">
                    Ver Transportes
                </a>
            </div>
            
            <!-- Productos Card -->
            <div style="border: 1px solid #e5e7eb; border-radius: 0.5rem; padding: 1.5rem; background: white;">
                <h3 style="font-weight: 500; font-size: 1.125rem; margin-bottom: 0.5rem; color: #1f2937;">Productos</h3>
                <a href="{{ route('productos.index') }}" 
                   style="display: inline-block; padding: 0.5rem 1rem; background: #16a34a; color: white; border-radius: 0.375rem; font-weight: 500; text-decoration: none;">
                    Ver Productos
                </a>
            </div>
            
            <!-- user Card -->
            <div style="border: 1px solid #e5e7eb; border-radius: 0.5rem; padding: 1.5rem; background: white;">
                <h3 style="font-weight: 500; font-size: 1.125rem; margin-bottom: 0.5rem; color: #1f2937;">Users</h3>
                <a href="{{ route('users.index') }}" 
                   style="display: inline-block; padding: 0.5rem 1rem; background: #7c3aed; color: white; border-radius: 0.375rem; font-weight: 500; text-decoration: none;">
                    Ver Users
                </a>
            </div>
            
            <!-- NEW Eco Tips Card -->
            <div style="border: 1px solid #e5e7eb; border-radius: 0.5rem; padding: 1.5rem; background: white;">
                <h3 style="font-weight: 500; font-size: 1.125rem; margin-bottom: 0.5rem; color: #1f2937;">Consejos Ecológicos</h3>
                <a href="{{ route('eco-tips.index') }}" 
                   style="display: inline-block; padding: 0.5rem 1rem; background: #059669; color: white; border-radius: 0.375rem; font-weight: 500; text-decoration: none;">
                    Ver Consejos
                </a>
            </div>
        </div>

        @include('partials.weather-widget')


        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST" style="margin-top: 2rem;">
            @csrf
            <button type="submit" 
                    style="padding: 0.5rem 1rem; background: #dc2626; color: white; border-radius: 0.375rem; font-weight: 500; border: none; cursor: pointer;">
                Cerrar Sesión
            </button>
        </form>
    </div>
</div>
@endsection