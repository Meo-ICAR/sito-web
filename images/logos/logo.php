<?php
/**
 * SVG logo dinamico in canvas 16:9 (allineato ai JPG del catalogo).
 * Uso: logo.php?m=fse | consultant
 */
header('Content-Type: image/svg+xml; charset=utf-8');
header('Cache-Control: public, max-age=86400');

$catalog = [
    'fse' => ['UnicoFSE', 'EU SOCIAL FUND PROJECTS'],
    'consultant' => ['UnicoConsultant', 'MULTI-TENANT LEGAL CONSOLE'],
];

$key = isset($_GET['m']) ? strtolower(preg_replace('/[^a-z]/', '', $_GET['m'])) : '';
if (!isset($catalog[$key])) {
    http_response_code(404);
    echo '<!-- not found -->';
    exit;
}

[$title, $subtitle] = $catalog[$key];
$fs = ($key === 'consultant') ? 40 : 52;

if ($key === 'fse') {
    $icon = '<g fill="#fff" stroke="#94a3b8" stroke-width="2"><circle cx="-14" cy="-10" r="10"/><circle cx="14" cy="-10" r="10"/><path d="M-28,22 C-28,8 -20,2 -14,2 C-8,2 0,8 0,22"/><path d="M0,22 C0,8 8,2 14,2 C20,2 28,8 28,22"/></g>';
} else {
    $icon = '<g><rect x="-28" y="-14" width="56" height="40" rx="4" fill="#fff" stroke="#94a3b8" stroke-width="2"/><path d="M-10,-14 V-22 H10 V-14" fill="none" stroke="#0ea5e9" stroke-width="4"/><rect x="-8" y="0" width="16" height="10" rx="2" fill="#e0f2fe"/></g>';
}

echo <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="1280" height="720" viewBox="0 0 1280 720" role="img" aria-label="{$title}">
  <defs>
    <linearGradient id="gStroke" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0b3a6e"/><stop offset="100%" stop-color="#12a06a"/>
    </linearGradient>
    <linearGradient id="gText" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" stop-color="#0a3d73"/><stop offset="100%" stop-color="#11a35f"/>
    </linearGradient>
    <linearGradient id="gIcon" x1="0%" y1="100%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#0a457d"/><stop offset="100%" stop-color="#14b86a"/>
    </linearGradient>
  </defs>
  <rect width="1280" height="720" fill="#eef3f7"/>
  <g transform="translate(280,250)">
    <rect x="8" y="8" width="704" height="204" rx="28" fill="#eef3f7" stroke="url(#gStroke)" stroke-width="5"/>
    <g transform="translate(78,110)">
      <g fill="url(#gIcon)">
        <path d="M0,-68 A68,68 0 0 1 58,-35 L48,-28 A56,56 0 0 0 0,-56 Z"/>
        <path d="M58,-35 A68,68 0 0 1 58,35 L48,28 A56,56 0 0 0 48,-28 Z"/>
        <path d="M58,35 A68,68 0 0 1 0,68 L0,56 A56,56 0 0 0 48,28 Z"/>
        <path d="M0,68 A68,68 0 0 1 -58,35 L-48,28 A56,56 0 0 0 0,56 Z"/>
        <path d="M-58,35 A68,68 0 0 1 -58,-35 L-48,-28 A56,56 0 0 0 -48,28 Z"/>
        <path d="M-58,-35 A68,68 0 0 1 0,-68 L0,-56 A56,56 0 0 0 -48,-28 Z"/>
        <path d="M50,-48 l18,2 -10,16 z"/><path d="M50,48 l10,-16 18,2 z"/>
        <path d="M-50,48 l-18,-2 10,-16 z"/><path d="M-50,-48 l-10,16 -18,-2 z"/>
      </g>
      {$icon}
      <path d="M8,8 L28,30 L62,-18" fill="none" stroke="#16c45a" stroke-width="14" stroke-linecap="round" stroke-linejoin="round"/>
    </g>
    <text x="190" y="108" font-family="Segoe UI, Arial, Helvetica, sans-serif" font-size="{$fs}" font-weight="800" fill="url(#gText)">{$title}</text>
    <text x="192" y="148" font-family="Segoe UI, Arial, Helvetica, sans-serif" font-size="18" font-weight="700" letter-spacing="1.5" fill="#0f172a">{$subtitle}</text>
  </g>
</svg>
SVG;
