@extends('layout')

@section('title', 'Gérer les Termes et Conditions')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        
        <form action="{{ route('settings.terms.update') }}" method="POST" class="p-6 space-y-6">
            @csrf
            
            <div class="space-y-2">
                <textarea name="value" rows="20" 
                          class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all outline-none font-mono text-sm leading-relaxed"
                          placeholder="Saisissez le contenu ici...">{{ old('value', $terms->value ?? '') }}</textarea>
            </div>

            <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-50">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all">
                    Enregistrer les modifications
                </button>
            </div>
        </form>

        @if(session('success'))
            <div class="m-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-xl flex items-center gap-3 text-green-700">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif
    </div>
</div>
@endsection
