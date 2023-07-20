export type IconFamily = "classic" | "sharp" | "duotone";
export type IconPrefix = "fas" | "far" | "fal" | "fat" | "fad" | "fab" | "fak" | "fass" ;
export type CssStyleClass = "fa-solid" | "fa-regular" | "fa-light" | "fa-thin" | "fa-duotone" | "fa-brands" ;
export type IconStyle = "solid" | "regular" | "light" | "thin" | "duotone" | "brands" ;
export type IconPathData = string | string[]

export interface IconLookup {
  prefix: IconPrefix;
  // IconName is defined in the code that will be generated at build time and bundled with this file.
  iconName: IconName;
}

export interface IconDefinition extends IconLookup {
  icon: [
    number, // width
    number, // height
    string[], // ligatures
    string, // unicode
    IconPathData // svgPathData
  ];
}

export interface IconPack {
  [key: string]: IconDefinition;
}

export type IconName = 'css3-alt' | 
  'linkedin-in' | 
  'vuejs' | 
  'discord' | 
  'angular' | 
  'wordpress' | 
  'react' | 
  'less' | 
  'facebook-f' | 
  'instagram' | 
  'html5' | 
  'sass' | 
  'js' | 
  'github' | 
  'php' | 
  'twitter' | 
  'telegram' | 
  'telegram-plane' | 
  'node-js' | 
  'right-from-bracket' | 
  'sign-out-alt' | 
  'bars' | 
  'navicon' | 
  'lock' | 
  'shield-check' | 
  'right-to-bracket' | 
  'sign-in-alt' | 
  'chess-knight' | 
  'unlock' | 
  'address-card' | 
  'contact-card' | 
  'vcard' | 
  'language' | 
  'badge-check' | 
  'xmark-large' | 
  'xmark' | 
  'close' | 
  'multiply' | 
  'remove' | 
  'times' | 
  'thumbs-up' | 
  'notdef' | 
  'right-from-bracket' | 
  'sign-out-alt' | 
  'bars' | 
  'navicon' | 
  'lock' | 
  'shield-check' | 
  'right-to-bracket' | 
  'sign-in-alt' | 
  'chess-knight' | 
  'unlock' | 
  'address-card' | 
  'contact-card' | 
  'vcard' | 
  'language' | 
  'badge-check' | 
  'xmark-large' | 
  'xmark' | 
  'close' | 
  'multiply' | 
  'remove' | 
  'times' | 
  'thumbs-up' | 
  'notdef';
