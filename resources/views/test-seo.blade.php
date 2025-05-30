@extends('.__base')

@section('seo')
    <x-seo-head 
        title="Test SEO - Muster & Dikson"
        description="Page de test pour vérifier l'implémentation SEO du site Muster & Dikson. Cette description fait exactement 120 caractères pour tester."
        keywords="test, SEO, Muster, Dikson"
    />
@endsection

@section('content')
<div class="container" style="padding: 50px 0;">
    <h1>Test SEO Implementation</h1>
    
    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;">
        <h2>SEO Analysis Results</h2>
        
        <div style="margin: 15px 0;">
            <strong>Title Length Check:</strong>
            <div id="title-check" style="padding: 10px; margin: 5px 0; border-radius: 4px;"></div>
        </div>
        
        <div style="margin: 15px 0;">
            <strong>Description Length Check:</strong>
            <div id="description-check" style="padding: 10px; margin: 5px 0; border-radius: 4px;"></div>
        </div>
        
        <div style="margin: 15px 0;">
            <strong>H1 Tags Count:</strong>
            <div id="h1-check" style="padding: 10px; margin: 5px 0; border-radius: 4px;"></div>
        </div>
        
        <div style="margin: 15px 0;">
            <strong>Meta Tags Present:</strong>
            <div id="meta-check" style="padding: 10px; margin: 5px 0; border-radius: 4px;"></div>
        </div>
    </div>
    
    <div style="background: #e9ecef; padding: 20px; border-radius: 8px; margin: 20px 0;">
        <h2>Current Page SEO Data</h2>
        <div id="current-seo-data"></div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get current page SEO data
    const title = document.title;
    const description = document.querySelector('meta[name="description"]')?.content || 'Not found';
    const h1Count = document.querySelectorAll('h1').length;
    
    // Check title length (optimal: 50-60 characters)
    const titleCheck = document.getElementById('title-check');
    const titleLength = title.length;
    if (titleLength >= 50 && titleLength <= 60) {
        titleCheck.style.backgroundColor = '#d4edda';
        titleCheck.style.color = '#155724';
        titleCheck.innerHTML = `✅ Perfect! Title is ${titleLength} characters (optimal: 50-60)`;
    } else if (titleLength < 50) {
        titleCheck.style.backgroundColor = '#fff3cd';
        titleCheck.style.color = '#856404';
        titleCheck.innerHTML = `⚠️ Title is ${titleLength} characters (too short, optimal: 50-60)`;
    } else {
        titleCheck.style.backgroundColor = '#f8d7da';
        titleCheck.style.color = '#721c24';
        titleCheck.innerHTML = `❌ Title is ${titleLength} characters (too long, optimal: 50-60)`;
    }
    
    // Check description length (optimal: 120-160 characters)
    const descriptionCheck = document.getElementById('description-check');
    const descriptionLength = description.length;
    if (descriptionLength >= 120 && descriptionLength <= 160) {
        descriptionCheck.style.backgroundColor = '#d4edda';
        descriptionCheck.style.color = '#155724';
        descriptionCheck.innerHTML = `✅ Perfect! Description is ${descriptionLength} characters (optimal: 120-160)`;
    } else if (descriptionLength < 120) {
        descriptionCheck.style.backgroundColor = '#fff3cd';
        descriptionCheck.style.color = '#856404';
        descriptionCheck.innerHTML = `⚠️ Description is ${descriptionLength} characters (too short, optimal: 120-160)`;
    } else {
        descriptionCheck.style.backgroundColor = '#f8d7da';
        descriptionCheck.style.color = '#721c24';
        descriptionCheck.innerHTML = `❌ Description is ${descriptionLength} characters (too long, optimal: 120-160)`;
    }
    
    // Check H1 count (should be exactly 1)
    const h1Check = document.getElementById('h1-check');
    if (h1Count === 1) {
        h1Check.style.backgroundColor = '#d4edda';
        h1Check.style.color = '#155724';
        h1Check.innerHTML = `✅ Perfect! Found exactly 1 H1 tag`;
    } else {
        h1Check.style.backgroundColor = '#f8d7da';
        h1Check.style.color = '#721c24';
        h1Check.innerHTML = `❌ Found ${h1Count} H1 tags (should be exactly 1)`;
    }
    
    // Check meta tags
    const metaCheck = document.getElementById('meta-check');
    const hasTitle = !!document.title;
    const hasDescription = !!document.querySelector('meta[name="description"]');
    const hasKeywords = !!document.querySelector('meta[name="keywords"]');
    const hasCanonical = !!document.querySelector('link[rel="canonical"]');
    const hasOgTitle = !!document.querySelector('meta[property="og:title"]');
    
    const metaResults = [
        hasTitle ? '✅ Title tag' : '❌ Title tag',
        hasDescription ? '✅ Meta description' : '❌ Meta description',
        hasKeywords ? '✅ Meta keywords' : '❌ Meta keywords',
        hasCanonical ? '✅ Canonical URL' : '❌ Canonical URL',
        hasOgTitle ? '✅ Open Graph tags' : '❌ Open Graph tags'
    ];
    
    metaCheck.innerHTML = metaResults.join('<br>');
    
    // Display current SEO data
    const currentSeoData = document.getElementById('current-seo-data');
    currentSeoData.innerHTML = `
        <p><strong>Title:</strong> ${title}</p>
        <p><strong>Description:</strong> ${description}</p>
        <p><strong>Title Length:</strong> ${titleLength} characters</p>
        <p><strong>Description Length:</strong> ${descriptionLength} characters</p>
        <p><strong>H1 Count:</strong> ${h1Count}</p>
    `;
});
</script>
@endsection
