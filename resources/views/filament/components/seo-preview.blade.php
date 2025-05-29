<div class="seo-preview-container" style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; background-color: #f9fafb; font-family: Arial, sans-serif;">
    <div class="seo-preview-header" style="margin-bottom: 12px;">
        <h4 style="margin: 0; font-size: 14px; font-weight: 600; color: #374151;">Aperçu dans les résultats de recherche Google</h4>
    </div>
    
    <div class="seo-preview-result" style="max-width: 600px;">
        <!-- URL -->
        <div class="seo-url" style="margin-bottom: 4px;">
            <span style="font-size: 14px; color: #1a73e8; text-decoration: none;">{{ $url }}</span>
        </div>
        
        <!-- Title -->
        <div class="seo-title" style="margin-bottom: 4px;">
            <h3 style="margin: 0; font-size: 20px; line-height: 1.3; color: #1a0dab; font-weight: normal; text-decoration: underline; cursor: pointer;">
                {{ $title }}
            </h3>
        </div>
        
        <!-- Description -->
        <div class="seo-description">
            <p style="margin: 0; font-size: 14px; line-height: 1.4; color: #4d5156;">
                {{ $description }}
            </p>
        </div>
    </div>
    
    <div class="seo-preview-stats" style="margin-top: 12px; padding-top: 12px; border-top: 1px solid #e5e7eb; font-size: 12px; color: #6b7280;">
        <div style="display: flex; justify-content: space-between;">
            <span>Titre: {{ strlen($title) }}/60 caractères</span>
            <span>Description: {{ strlen($description) }}/160 caractères</span>
        </div>
        
        @if(strlen($title) > 60)
            <div style="color: #dc2626; margin-top: 4px;">⚠️ Le titre est trop long et sera tronqué</div>
        @endif
        
        @if(strlen($description) > 160)
            <div style="color: #dc2626; margin-top: 4px;">⚠️ La description est trop longue et sera tronquée</div>
        @endif
        
        @if(strlen($title) < 30)
            <div style="color: #f59e0b; margin-top: 4px;">💡 Le titre pourrait être plus descriptif</div>
        @endif
        
        @if(strlen($description) < 120)
            <div style="color: #f59e0b; margin-top: 4px;">💡 La description pourrait être plus détaillée</div>
        @endif
    </div>
</div>
