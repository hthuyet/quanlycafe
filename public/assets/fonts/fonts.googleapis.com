/* cyrillic-ext */
@font-face {
  font-family: 'Noto Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Noto Sans'), local('NotoSans'), url(https://fonts.gstatic.com/s/notosans/v6/C7bP6N8yXZ-PGLzbFLtQKRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
}
/* cyrillic */
@font-face {
  font-family: 'Noto Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Noto Sans'), local('NotoSans'), url(https://fonts.gstatic.com/s/notosans/v6/iLJc6PpCnnbQjYc1Jq4v0xJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* devanagari */
@font-face {
  font-family: 'Noto Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Noto Sans'), local('NotoSans'), url(https://fonts.gstatic.com/s/notosans/v6/5pCv5Yz4eMu9gmvX8nNhfRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+02BC, U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200B-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
}
/* greek-ext */
@font-face {
  font-family: 'Noto Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Noto Sans'), local('NotoSans'), url(https://fonts.gstatic.com/s/notosans/v6/gEkd0pn-sMtQ_P4HUpi6WBJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+1F00-1FFF;
}
/* greek */
@font-face {
  font-family: 'Noto Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Noto Sans'), local('NotoSans'), url(https://fonts.gstatic.com/s/notosans/v6/iPF-u8L1qkTPHaKjvXERnxJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0370-03FF;
}
/* vietnamese */
@font-face {
  font-family: 'Noto Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Noto Sans'), local('NotoSans'), url(https://fonts.gstatic.com/s/notosans/v6/mTzVK0-EJOCaJiOPeaz-hxJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Noto Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Noto Sans'), local('NotoSans'), url(https://fonts.gstatic.com/s/notosans/v6/erE3KsIWUumgD1j_Ca-V-xJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Noto Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Noto Sans'), local('NotoSans'), url(https://fonts.gstatic.com/s/notosans/v6/LeFlHvsZjXu2c3ZRgBq9nFtXRa8TVwTICgirnJhmVJw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
