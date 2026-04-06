<?php
/**
 * Icon Library - 6 Sets with 100+ Icons
 * 
 * @package KreativeCashflow
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function kc_get_icon_sets() {
    return array(
        'property' => 'Property Services',
        'real-estate' => 'Real Estate & Buildings',
        'finance' => 'Finance & Money',
        'business' => 'Business & Growth',
        'features' => 'Features & UI',
        'social' => 'Social Media',
    );
}

function kc_get_all_icons( $set = 'property' ) {
    $icons = array(
        // PROPERTY SERVICES (10)
        'property' => array(
            'first-home' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 20L24 4L42 20V42H30V30H18V42H6V20Z"/><circle cx="24" cy="20" r="3"/></svg>',
            'investment' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 38L14 30L22 36L32 22L42 32"/><circle cx="40" cy="12" r="6"/><path d="M36 12H44V20"/></svg>',
            'mortgage' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="10" width="36" height="28" rx="2"/><path d="M24 20V28M20 24H28"/><path d="M6 18H42"/></svg>',
            'legal' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 6H28L36 14V42H12V6H14Z"/><path d="M28 6V14H36M18 22H30M18 30H30"/></svg>',
            'inspection' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="20" cy="20" r="12"/><path d="M28 28L40 40"/><path d="M20 14V20L24 22"/></svg>',
            'management' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="14" r="6"/><path d="M6 38C6 31.4 10.5 26 18 26C25.5 26 30 31.4 30 38"/><path d="M32 14H44M32 20H40M32 26H44"/></svg>',
            'conveyancing' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="6" width="28" height="36" rx="2"/><path d="M18 14H30M18 22H30M18 30H26"/><circle cx="32" cy="36" r="2"/></svg>',
            'valuation' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 24L24 8L40 24V40H8V24Z"/><path d="M18 32H30M24 26V38"/><path d="M18 18H20M28 18H30"/></svg>',
            'auction' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10 38L22 26L18 22L6 34L10 38Z"/><path d="M26 18L38 6L42 10L30 22L26 18Z"/><path d="M18 22L26 30"/></svg>',
            'settlement' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 24L18 34L40 12"/><circle cx="24" cy="24" r="18"/></svg>',
        ),
        
        // REAL ESTATE (15)
        'real-estate' => array(
            'house' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 20L24 6L42 20V42H6V20Z"/><rect x="18" y="28" width="12" height="14"/><path d="M14 16L18 13M30 13L34 16"/></svg>',
            'apartment' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="6" width="28" height="36"/><path d="M16 12H20M28 12H32M16 20H20M28 20H32M16 28H20M28 28H32M16 36H20M28 36H32"/></svg>',
            'commercial' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="12" width="36" height="30"/><path d="M6 18H42M14 18V42M34 18V42M22 24H26M22 32H26"/></svg>',
            'townhouse' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 18L14 8L24 18V42H4V18Z"/><path d="M24 18L34 8L44 18V42H24V18Z"/><rect x="8" y="30" width="6" height="12"/><rect x="34" y="30" width="6" height="12"/></svg>',
            'land' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 28C8 24 12 20 16 24C20 28 24 20 28 24C32 28 36 24 44 28V42H4V28Z"/></svg>',
            'villa' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22L18 10L30 22V40H6V22Z"/><path d="M30 28H42V40H30V28Z"/><path d="M38 28V24L42 22"/></svg>',
            'studio' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="12" width="32" height="28" rx="2"/><path d="M8 24H40M20 12V40M28 24V40"/></svg>',
            'penthouse' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="12" y="16" width="24" height="24"/><path d="M8 16L24 4L40 16"/><path d="M20 24H28M20 32H28"/></svg>',
            'garage' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 18L24 6L42 18V42H6V18Z"/><rect x="14" y="26" width="20" height="16"/><path d="M14 32H34"/></svg>',
            'garden' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 42V30"/><path d="M18 30C18 24 12 20 8 20C8 26 12 30 18 30Z"/><path d="M30 30C30 24 36 20 40 20C40 26 36 30 30 30Z"/><circle cx="24" cy="18" r="8"/></svg>',
            'pool' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="16" width="36" height="22" rx="3"/><path d="M12 28C14 26 16 26 18 28C20 30 22 30 24 28C26 26 28 26 30 28C32 30 34 30 36 28"/><path d="M10 20L16 26M38 20L32 26"/></svg>',
            'balcony' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="12" width="36" height="28"/><path d="M6 28H42"/><path d="M14 28V40M22 28V40M30 28V40M38 28V40"/></svg>',
            'furnished' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="20" width="32" height="18"/><path d="M12 20V14H20V20M28 20V14H36V20"/><path d="M8 26H40M6 38H42"/></svg>',
            'parking' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="6" width="36" height="36" rx="2"/><path d="M16 14H26C29 14 32 17 32 20C32 23 29 26 26 26H16V14ZM16 26V34"/></svg>',
            'elevator' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="12" y="6" width="24" height="36" rx="2"/><path d="M20 18L24 14L28 18M20 30L24 34L28 30"/><path d="M24 14V34"/></svg>',
        ),
        
        // FINANCE & MONEY (18)
        'finance' => array(
            'dollar' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4V44M18 12H28C30 12 32 14 32 16C32 18 30 20 28 20H20C18 20 16 22 16 24C16 26 18 28 20 28H30"/></svg>',
            'calculator' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="4" width="32" height="40" rx="2"/><rect x="12" y="8" width="24" height="8"/><path d="M16 24V24.02M24 24V24.02M32 24V24.02M16 32V32.02M24 32V32.02M32 32V32.02"/></svg>',
            'chart-up' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 38L16 28L24 34L32 20L42 28M42 28V20M42 28H34"/></svg>',
            'wallet' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="12" width="36" height="26" rx="2"/><path d="M6 20H42"/><circle cx="34" cy="26" r="3"/></svg>',
            'coins' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="24" r="14"/><path d="M30 14C36 16 40 20 40 24C40 32 34 38 26 40"/></svg>',
            'piggybank' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="28" cy="24" rx="16" ry="12"/><circle cx="34" cy="20" r="2"/><path d="M44 20H40M12 24H8M28 36V42"/><path d="M20 18H22"/></svg>',
            'bank' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 16L24 4L44 16V20H4V16Z"/><path d="M8 20V40M18 20V40M28 20V40M38 20V40M4 40H44"/></svg>',
            'credit-card' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="12" width="40" height="24" rx="3"/><path d="M4 20H44M12 32H20M28 32H32"/></svg>',
            'invoice' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="6" width="28" height="36"/><path d="M16 14H32M16 22H32M16 30H26M24 6V2M10 42L14 38L18 42"/></svg>',
            'receipt' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10 4H38V44L34 40L30 44L26 40L22 44L18 40L14 44L10 40V4Z"/><path d="M16 12H32M16 20H32M16 28H26"/></svg>',
            'tax' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="8" width="32" height="32" rx="2"/><path d="M18 18V30M24 14V34M30 20V28"/></svg>',
            'interest' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="18"/><path d="M24 12V24L32 28"/></svg>',
            'savings' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 8V18M24 30V40M16 24H8M40 24H32"/><circle cx="24" cy="24" r="6"/><circle cx="24" cy="24" r="12"/></svg>',
            'budget' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="6" width="36" height="36" rx="2"/><path d="M24 14V34M14 24H34"/></svg>',
            'loan' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 28L8 24L12 20M36 20L40 24L36 28"/><path d="M14 24H34"/><rect x="16" y="10" width="16" height="8" rx="2"/><rect x="16" y="30" width="16" height="8" rx="2"/></svg>',
            'deposit' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 30V4M16 12L24 4L32 12"/><rect x="8" y="30" width="32" height="12" rx="2"/></svg>',
            'withdraw' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4V30M16 22L24 30L32 22"/><rect x="8" y="36" width="32" height="6" rx="1"/></svg>',
            'profit' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="28" width="6" height="16"/><rect x="18" y="22" width="6" height="22"/><rect x="28" y="14" width="6" height="30"/><rect x="38" y="8" width="6" height="36"/></svg>',
        ),
        
        // BUSINESS (20)
        'business' => array(
            'briefcase' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="16" width="40" height="24" rx="2"/><path d="M16 16V12C16 10 18 8 20 8H28C30 8 32 10 32 12V16M4 24H44"/></svg>',
            'handshake' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 28L8 24L12 20L24 32L36 20L40 24L36 28L24 40L12 28Z"/></svg>',
            'target' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="18"/><circle cx="24" cy="24" r="12"/><circle cx="24" cy="24" r="6"/><circle cx="24" cy="24" r="2"/></svg>',
            'award' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="20" r="12"/><path d="M18 28L16 44L24 40L32 44L30 28"/></svg>',
            'shield' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4L6 12V24C6 34 14 42 24 44C34 42 42 34 42 24V12L24 4Z"/><path d="M18 24L22 28L30 18"/></svg>',
            'team' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="16" cy="14" r="6"/><circle cx="32" cy="14" r="6"/><path d="M4 38C4 32 8 28 16 28C24 28 28 32 28 38M20 38C20 32 24 28 32 28C40 28 44 32 44 38"/></svg>',
            'presentation' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="6" width="36" height="26"/><path d="M24 32V42M18 42H30M12 14H36M18 20L30 24"/></svg>',
            'strategy' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 36L24 24L36 36M12 24L24 12L36 24"/><circle cx="24" cy="12" r="3"/><circle cx="24" cy="24" r="3"/><circle cx="12" cy="24" r="3"/><circle cx="36" cy="24" r="3"/></svg>',
            'idea' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4C18 4 14 8 14 14C14 18 16 20 16 24H32C32 20 34 18 34 14C34 8 30 4 24 4Z"/><path d="M18 30H30M20 36H28M24 36V42"/></svg>',
            'document' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4H28L36 12V44H12V4H14Z"/><path d="M28 4V12H36M18 20H30M18 28H30M18 36H26"/></svg>',
            'folder' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 12H20L24 16H42V38H6V12Z"/></svg>',
            'analytics' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 38L16 30L24 36L32 22L40 28M4 6H44M4 42H44"/></svg>',
            'checklist' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="6" width="28" height="36" rx="2"/><path d="M16 16L20 20L28 12M16 26L20 30L28 22M16 36L20 40L28 32"/></svg>',
            'calendar' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="10" width="36" height="32" rx="2"/><path d="M6 18H42M16 6V14M32 6V14"/></svg>',
            'clock' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="18"/><path d="M24 12V24L32 28"/></svg>',
            'chart-pie' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="16"/><path d="M24 8V24L38 30"/><path d="M24 24L38 18"/></svg>',
            'growth' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 40L18 30L26 36L38 20M38 20H30M38 20V28"/></svg>',
            'deal' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 24H12L8 28L12 32H20M28 24H36L40 28L36 32H28"/><circle cx="20" cy="28" r="8"/><circle cx="28" cy="28" r="8"/></svg>',
            'contract-sign' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="6" width="28" height="36" rx="2"/><path d="M16 14H32M16 22H32M16 30H24"/><path d="M28 36C30 34 32 34 34 36"/></svg>',
            'meeting-room' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="12" width="36" height="24" rx="2"/><circle cx="18" cy="24" r="4"/><circle cx="30" cy="24" r="4"/><path d="M24 12V36"/></svg>',
        ),
        
        // FEATURES & UI (22)
        'features' => array(
            'star' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4L28 18H42L30 26L34 40L24 32L14 40L18 26L6 18H20L24 4Z"/></svg>',
            'check' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 24L18 34L40 12"/></svg>',
            'phone' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4H34C36 4 38 6 38 8V40C38 42 36 44 34 44H14C12 44 10 42 10 40V8C10 6 12 4 14 4Z"/><circle cx="24" cy="38" r="2"/></svg>',
            'email' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="10" width="40" height="28" rx="2"/><path d="M4 14L24 28L44 14"/></svg>',
            'support' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="18"/><path d="M24 18V24M24 30H24.02"/></svg>',
            'heart' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 40L8 24C2 18 2 8 12 8C18 8 22 12 24 16C26 12 30 8 36 8C46 8 46 18 40 24L24 40Z"/></svg>',
            'thumbs-up' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 24H14V44H8V24ZM18 20L22 4H30L28 20H42V28L36 44H18V20Z"/></svg>',
            'download' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4V32M16 24L24 32L32 24M8 36V40C8 42 10 44 12 44H36C38 44 40 42 40 40V36"/></svg>',
            'search' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="20" cy="20" r="14"/><path d="M30 30L42 42"/></svg>',
            'bell' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 38C20 40 22 42 24 42C26 42 28 40 28 38M10 34H38C38 34 36 32 36 24C36 16 30 10 24 10C18 10 12 16 12 24C12 32 10 34 10 34Z"/></svg>',
            'settings' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="4"/><path d="M24 14V10M24 38V34M34 24H38M10 24H14M31 31L34 34M14 14L17 17M17 31L14 34M34 14L31 17"/></svg>',
            'lock' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="20" width="28" height="20" rx="2"/><path d="M16 20V14C16 10 18 6 24 6C30 6 32 10 32 14V20"/></svg>',
            'user' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="16" r="8"/><path d="M8 40C8 32 14 26 24 26C34 26 40 32 40 40"/></svg>',
            'location-pin' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4C16 4 8 10 8 18C8 28 24 44 24 44C24 44 40 28 40 18C40 10 32 4 24 4Z"/><circle cx="24" cy="18" r="4"/></svg>',
            'gift' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="20" width="36" height="24"/><path d="M24 20V44M6 28H42M20 20C18 18 16 14 20 10C24 6 26 10 24 12M28 20C30 18 32 14 28 10C24 6 22 10 24 12"/></svg>',
            'wifi' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 18C8 14 16 10 24 10C32 10 40 14 44 18M10 26C13 23 18 20 24 20C30 20 35 23 38 26M16 34C18 32 21 30 24 30C27 30 30 32 32 34"/><circle cx="24" cy="40" r="2"/></svg>',
            'camera' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="14" width="40" height="26" rx="2"/><circle cx="24" cy="27" r="7"/><path d="M16 8L18 14M32 8L30 14"/></svg>',
            'video' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="12" width="28" height="24" rx="2"/><path d="M32 20L44 14V34L32 28"/></svg>',
            'microphone' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="18" y="4" width="12" height="20" rx="6"/><path d="M12 22C12 28 17 33 24 34M24 34C31 33 36 28 36 22M24 34V44M18 44H30"/></svg>',
            'map' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 8L16 4L32 12L44 8V40L32 44L16 36L4 40V8Z"/><path d="M16 4V36M32 12V44"/></svg>',
            'bookmark' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6H36V44L24 36L12 44V6Z"/></svg>',
            'share' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="36" cy="12" r="6"/><circle cx="12" cy="24" r="6"/><circle cx="36" cy="36" r="6"/><path d="M17 27L31 34M17 21L31 14"/></svg>',
        ),
        
        // SOCIAL MEDIA (15)
        'social' => array(
            'facebook' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4C12.95 4 4 12.95 4 24s8.95 20 20 20 20-8.95 20-20S35.05 4 24 4zm5 14h-3c-1 0-1 .5-1 1v2h4l-.5 4H25v12h-4V25h-3v-4h3v-3c0-2.5 1.5-5 5-5h3v4z"/></svg>',
            'instagram' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="8" width="32" height="32" rx="8"/><circle cx="24" cy="24" r="7"/><circle cx="35" cy="13" r="1.5" fill="currentColor"/></svg>',
            'linkedin' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M40 4H8C5.8 4 4 5.8 4 8v32c0 2.2 1.8 4 4 4h32c2.2 0 4-1.8 4-4V8c0-2.2-1.8-4-4-4zM16 38h-4V20h4v18zm-2-20.5c-1.4 0-2.5-1.1-2.5-2.5s1.1-2.5 2.5-2.5 2.5 1.1 2.5 2.5-1.1 2.5-2.5 2.5zM38 38h-4v-9c0-2.2-1.8-4-4-4s-4 1.8-4 4v9h-4V20h4v2c1.2-1.5 3-2.5 5-2.5 3.9 0 7 3.1 7 7v11.5z"/></svg>',
            'youtube' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M40 14c-.7-2.8-2.8-5-5.6-5.6C30.4 8 24 8 24 8s-6.4 0-10.4.4C11 8.9 8.9 11.1 8.2 14 7.8 18 7.8 24 7.8 24s0 6 .4 10c.7 2.9 2.8 5.1 5.6 5.6 4 .4 10.4.4 10.4.4s6.4 0 10.4-.4c2.8-.5 4.9-2.7 5.6-5.6.4-4 .4-10 .4-10s0-6-.4-10zM20 30V18l9 6-9 6z"/></svg>',
            'twitter' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M42 12.5c-1.5.7-3.1 1.1-4.8 1.3 1.7-1 3-2.7 3.6-4.6-1.6.9-3.4 1.6-5.3 2-1.5-1.6-3.7-2.7-6.1-2.7-4.6 0-8.3 3.7-8.3 8.3 0 .7.1 1.3.2 1.9-6.9-.3-13-3.7-17.1-8.7-.7 1.2-1.1 2.7-1.1 4.2 0 2.9 1.5 5.4 3.7 6.9-1.4 0-2.6-.4-3.8-1v.1c0 4 2.9 7.4 6.7 8.2-.7.2-1.4.3-2.2.3-.5 0-1.1-.1-1.6-.1 1.1 3.3 4.2 5.7 7.8 5.8-2.9 2.2-6.5 3.6-10.4 3.6-.7 0-1.3 0-2-.1 3.7 2.4 8.1 3.8 12.8 3.8 15.4 0 23.8-12.7 23.8-23.8v-1.1c1.6-1.2 3-2.6 4.1-4.2z"/></svg>',
            'whatsapp' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4C12.95 4 4 12.95 4 24c0 3.5.9 6.8 2.5 9.6L4 44l10.7-2.4C17.4 43.1 20.6 44 24 44c11.05 0 20-8.95 20-20S35.05 4 24 4zm9.8 26.9c-.4 1.2-2.4 2.3-3.3 2.4-.9.1-1.7.4-5.8-1.2-4.9-1.9-8-6.9-8.3-7.2-.3-.3-2.3-3-2.3-5.8s1.5-4.1 2-4.7c.6-.6 1.2-.7 1.6-.7h1.2c.4 0 .9-.1 1.4 1.1.5 1.2 1.7 4.2 1.8 4.5.2.3.3.6.1 1-.2.4-.3.5-.6.8-.3.3-.6.7-.9 1-.3.3-.6.6-.3 1.2s1.6 2.7 3.5 4.4c2.4 2.2 4.4 2.9 5 3.2s1 .2 1.4-.2c.4-.4 1.7-2 2.2-2.7.5-.7 1-.6 1.6-.4.6.3 3.8 1.8 4.4 2.1.6.3 1 .5 1.2.8.2.4.2 2-.2 3.2z"/></svg>',
            'telegram' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4C12.95 4 4 12.95 4 24s8.95 20 20 20 20-8.95 20-20S35.05 4 24 4zm10.2 14.2l-3.4 16c-.3 1.2-1 1.5-2 .9l-5.5-4-2.7 2.6c-.3.3-.5.5-1 .5l.4-5.4 9.4-8.5c.4-.4-.1-.6-.6-.2l-11.6 7.3-5-1.6c-1.1-.3-1.1-1.1.2-1.6l19.5-7.5c.9-.3 1.7.2 1.4 1.5z"/></svg>',
            'tiktok' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M34 12c-2 0-3.5-1.5-3.5-3.5V4h-6v24c0 3-2.5 5.5-5.5 5.5S13.5 31 13.5 28s2.5-5.5 5.5-5.5c.5 0 1 .1 1.5.2V16c-4.4 0-8 3.6-8 8s3.6 8 8 8 8-3.6 8-8v-8.5c2 1.5 4.5 2.5 7 2.5V12z"/></svg>',
            'pinterest' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4C12.95 4 4 12.95 4 24c0 8.4 5.2 15.6 12.5 18.5-.2-1.4-.3-3.5.1-5 .3-1.4 2.1-8.8 2.1-8.8s-.5-1.1-.5-2.7c0-2.5 1.5-4.4 3.3-4.4 1.5 0 2.3 1.2 2.3 2.5 0 1.5-1 3.9-1.5 6-.4 1.8.9 3.3 2.7 3.3 3.2 0 5.7-3.4 5.7-8.3 0-4.3-3.1-7.4-7.5-7.4-5.1 0-8.1 3.8-8.1 7.7 0 1.5.6 3.1 1.3 4 .2.2.2.3.1.6l-.5 1.9c-.1.4-.3.5-.7.3-2.5-1.2-4.1-4.8-4.1-7.7 0-5.7 4.1-10.9 11.9-10.9 6.3 0 11.1 4.5 11.1 10.4 0 6.2-3.9 11.2-9.4 11.2-1.8 0-3.5-.9-4.1-2 0 0-.9 3.4-1.1 4.2-.4 1.5-1.5 3.4-2.2 4.5 1.7.5 3.4.8 5.2.8 11.05 0 20-8.95 20-20S35.05 4 24 4z"/></svg>',
            'snapchat' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4c-5.5 0-10 4.5-10 10v8c0 1.1-.9 2-2 2s-2 .9-2 2c0 2.2 2.2 4 4 4 .6 0 1.1.5 1.1 1.1 0 1.1 1.1 1.9 2.2 1.9h13.4c1.1 0 2.2-.8 2.2-1.9 0-.6.5-1.1 1.1-1.1 1.8 0 4-1.8 4-4 0-1.1-.9-2-2-2s-2-.9-2-2v-8c0-5.5-4.5-10-10-10z"/></svg>',
            'reddit' => '<svg viewBox="0 0 48 48" fill="currentColor"><circle cx="24" cy="24" r="20"/><path d="M34 24c0-1.7-1.3-3-3-3-.8 0-1.5.3-2 .8-2-1.4-4.7-2.3-7.7-2.4l1.3-6 4.3.9c0 1.4 1.1 2.5 2.5 2.5s2.5-1.1 2.5-2.5-1.1-2.5-2.5-2.5c-1 0-1.9.6-2.3 1.4l-4.8-1c-.3-.1-.6.1-.7.4l-1.5 6.7c-3 .1-5.7 1-7.7 2.4-.5-.5-1.2-.8-2-.8-1.7 0-3 1.3-3 3 0 1.2.7 2.2 1.7 2.7-.1.4-.1.8-.1 1.2 0 4.4 4.5 8 10 8s10-3.6 10-8c0-.4 0-.8-.1-1.2 1-.5 1.7-1.5 1.7-2.7zm-16 2c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2zm11.5 5.5c-1.4 1.4-4.1 1.5-5.5 1.5s-4.1-.1-5.5-1.5c-.2-.2-.2-.5 0-.7s.5-.2.7 0c1 1 3.2 1.2 4.8 1.2s3.8-.2 4.8-1.2c.2-.2.5-.2.7 0s.2.5 0 .7zM28 28c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" fill="white"/></svg>',
            'discord' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M38 10c-2.5-1.2-5.3-2-8.2-2.5-.4.7-.8 1.5-1.1 2.3-3.1-.5-6.1-.5-9.1 0-.3-.8-.7-1.6-1.1-2.3-2.9.5-5.7 1.3-8.2 2.5-5.8 8.7-7.4 17.2-6.6 25.5 3.5 2.6 6.9 4.2 10.2 5.2.8-1.1 1.5-2.3 2.1-3.5-1.2-.4-2.3-1-3.3-1.6.3-.2.6-.4.8-.6 6.4 3 13.7 3 19.9 0 .3.2.6.4.8.6-1 .6-2.1 1.2-3.3 1.6.6 1.2 1.3 2.4 2.1 3.5 3.3-1 6.7-2.6 10.2-5.2.9-9.5-1.5-17.7-6.6-25.5zM18.5 30.5c-2.2 0-4-2-4-4.5s1.8-4.5 4-4.5 4 2 4 4.5-1.8 4.5-4 4.5zm11 0c-2.2 0-4-2-4-4.5s1.8-4.5 4-4.5 4 2 4 4.5-1.8 4.5-4 4.5z"/></svg>',
            'twitch' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M10 4L6 12V40H14V44H18L22 40H30L42 28V4H10ZM38 26L32 32H26L21 37V32H14V8H38V26ZM32 14V24H28V14H32ZM22 14V24H18V14H22Z"/></svg>',
            'spotify' => '<svg viewBox="0 0 48 48" fill="currentColor"><circle cx="24" cy="24" r="20"/><path d="M32 28c-5-3-12-3-16-2-.6.2-1.2-.2-1.4-.8-.2-.6.2-1.2.8-1.4 5-1 12-1 18 2 .5.3.7 1 .4 1.5-.3.5-1 .7-1.5.4-.1-.1-.2-.1-.3-.2zm-1.5-5c-5-3-12-4-17-2-.7.2-1.4-.2-1.6-.9-.2-.7.2-1.4.9-1.6 6-2 13-1 19 2 .6.3.8 1.1.5 1.7-.3.6-1.1.8-1.7.5-.1 0-.1 0-.1-.1zm-1.5-5c-5-3-14-3-19-2-.8.2-1.6-.3-1.8-1.1-.2-.8.3-1.6 1.1-1.8 6-1 15-1 21 2 .7.4 1 1.3.6 2-.4.7-1.3 1-2 .6 0 0 0 0 0 0z" fill="white"/></svg>',
            'slack' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M18 10c0-2.2-1.8-4-4-4s-4 1.8-4 4 1.8 4 4 4h4v-4zm0 8c0-2.2-1.8-4-4-4s-4 1.8-4 4v10c0 2.2 1.8 4 4 4s4-1.8 4-4V18zm8-8c0-2.2-1.8-4-4-4s-4 1.8-4 4 1.8 4 4 4 4-1.8 4-4zm0 24v-10c0-2.2-1.8-4-4-4s-4 1.8-4 4 1.8 4 4 4v6c0 2.2 1.8 4 4 4s4-1.8 4-4zm8-20c0-2.2-1.8-4-4-4s-4 1.8-4 4 1.8 4 4 4 4-1.8 4-4zm-4 8c-2.2 0-4 1.8-4 4s1.8 4 4 4h10c2.2 0 4-1.8 4-4s-1.8-4-4-4h-10z"/></svg>',
        ),
    );
    
    return isset( $icons[ $set ] ) ? $icons[ $set ] : $icons['property'];
}

function kc_icon( $slug, $set = 'property' ) {
    $icons = kc_get_all_icons( $set );
    return isset( $icons[ $slug ] ) ? $icons[ $slug ] : ( $icons['first-home'] ?? '' );
}

function kc_render_icon( $icon_string ) {
    if ( strpos( $icon_string, '__' ) !== false ) {
        list( $set, $slug ) = explode( '__', $icon_string, 2 );
        return kc_icon( $slug, $set );
    }
    return kc_icon( $icon_string );
}
