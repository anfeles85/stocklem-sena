@component('mail::layout')

@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        <div style="text-align: center; padding: 20px 10px; max-width: 600px; margin: 0 auto;">
            <h1 style="color: #39a900; margin: 0 0 10px 0; font-size: clamp(24px, 5vw, 32px); font-weight: bold; letter-spacing: 1px;">
                STOCKLEM
            </h1>
            <p style="color: #2e5f3e; margin: 0 0 15px 0; font-size: clamp(12px, 3vw, 14px);">
                Sistema de Inventario - SENA
            </p>
            <div style="background: #39a900; color: white; display: inline-block; padding: 12px 24px; border-radius: 25px; font-weight: bold; font-size: clamp(14px, 3vw, 16px); max-width: 90%;">
                Alerta de Stock Crítico
            </div>
        </div>
    @endcomponent
@endslot

<div style="max-width: 600px; margin: 0 auto; padding: 0 20px;">
    
    <div style="margin: 25px 0; text-align: center;">
        <p style="font-size: clamp(14px, 4vw, 16px); color: #333;">Hola <strong style="color: #39a900;">{{ $adminName }}</strong>,</p>
    </div>

    <div style="margin: 20px 0;">
        @component('mail::panel')
            <div style="text-align: center; font-size: clamp(14px, 4vw, 16px); color: #2e5f3e; padding: 10px;">
                Se detectaron <strong style="color: #39a900;">{{ $articles->count() }}</strong> artículo(s) con stock crítico
            </div>
        @endcomponent
    </div>

    <div style="margin: 20px 0; overflow-x: auto;">
        @component('mail::table')
        | Artículo | Actual | Mínimo | Estado |
        |----------|--------|--------|--------|
        @foreach ($articles as $article)
        | **{{ $article->name }}** | {{ $article->quantity }} | {{ $article->min_quantity }} | <span style="background: {{ $article->quantity == 0 ? '#d32f2f' : '#ff8f00' }}; color: white; padding: 3px 8px; border-radius: 12px; font-size: clamp(10px, 2.5vw, 11px); font-weight: bold; white-space: nowrap;">{{ $article->quantity == 0 ? 'SIN STOCK' : 'CRÍTICO' }}</span> |
        @endforeach
        @endcomponent
    </div>

    <div style="text-align: center; margin: 30px 0;">
        <div style="display: inline-block;">
            @component('mail::button', ['url' => url('/article/index'), 'color' => 'success'])
                Gestionar Inventario
            @endcomponent
        </div>
    </div>

    <div style="padding: 15px; background-color: #f1f8e9; border-left: 4px solid #39a900; border-radius: 4px; margin: 20px 0;">
        <p style="margin: 0; color: #2e5f3e; font-size: clamp(12px, 3vw, 14px); text-align: center;">
            <strong>Importante:</strong> Reabastecer estos artículos para evitar interrupciones operativas.
        </p>
    </div>

</div>

@slot('footer')
    @component('mail::footer')
        <div style="text-align: center; color: #39a900; font-size: clamp(10px, 2.5vw, 12px); max-width: 600px; margin: 0 auto; padding: 0 20px;">
            &copy; {{ now()->year }} STOCKLEM - Sistema de Inventario SENA<br>
            <span style="color: #666; font-size: clamp(9px, 2vw, 10px);">Servicio Nacional de Aprendizaje</span>
        </div>
    @endcomponent
@endslot

@endcomponent