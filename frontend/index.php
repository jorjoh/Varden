<?php
    @ob_start();
    include('inc/functions/dbcon.php');
?>
<!doctype html>
<html xml:lang="no" lang="no">
<head>
    <title>Agderposten &mdash; Agderposten</title>

    <meta name="robots" content="noarchive">

    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link rel="icon" type="image/png" href="../frontend/img/VA-fav-icon-152.png">
    <style type="text/css">
        .Header, .Header-content {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box
        }

        .Header-actions-link, .Header-menu-button, .Menu-search-input, .Share-close {
            -moz-appearance: none;
            -webkit-appearance: none
        }

        .Footer:before, .Header-information-category:after, .Menu-list-item--updated:after, .Menu-search:after, .Share-close:before, .has--js .Header-menu-button:before {
            content: ''
        }

        .Footer-links, .Header-actions, .Menu-list {
            list-style: none
        }

        .Footer, .Header {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .env--agderposten .Header-logo a {
            background: url(http://cdn.agderposten.no/data/img/agderposten/logo.png?26161148884) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/agderposten/logo.svg?21434302816) center no-repeat, none
        }

        .env--agderposten .Footer-logo {
            background: url(http://cdn.agderposten.no/data/img/agderposten/logo_black.png?6475364940) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/agderposten/logo_black.svg?49689149491) center no-repeat, none
        }

        .env--agderposten .Footer-logo, .env--agderposten .Header-logo a {
            width: 100px;
            height: 26px
        }

        .env--gat .Footer-logo, .env--gat .Header-logo a {
            background: url(http://cdn.agderposten.no/data/img/gat/logo_black.png?30754155449) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/gat/logo_black.svg?18682818501) center no-repeat, none;
            width: 134px;
            height: 26px
        }

        .env--varden .Header-logo a {
            background: url(http://cdn.agderposten.no/data/img/varden/logo.png?87765316451) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/varden/logo.svg?5964370778) center no-repeat, none
        }

        .env--varden .Footer-logo {
            background: url(http://cdn.agderposten.no/data/img/varden/logo_black.png?50183337067) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/varden/logo_black.svg?30661834043) center no-repeat, none
        }

        .env--varden .Footer-logo, .env--varden .Header-logo a {
            width: 86px;
            height: 26px
        }

        .env--vt .Header-logo a {
            background: url(http://cdn.agderposten.no/data/img/vt/logo.png?65492951185) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/vt/logo.svg?14805861428) center no-repeat, none
        }

        .env--vt .Footer-logo {
            background: url(http://cdn.agderposten.no/data/img/vt/logo_black.png?4301664164) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/vt/logo_black.svg?13778580101) center no-repeat, none
        }

        .env--vt .Footer-logo, .env--vt .Header-logo a {
            width: 147px;
            height: 26px
        }

        .env--demokraten .Header-logo a {
            background: url(http://cdn.agderposten.no/data/img/demokraten/logo.png?37930272654) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/demokraten/logo.svg?80576141760) center no-repeat, none
        }

        .env--demokraten .Footer-logo {
            background: url(http://cdn.agderposten.no/data/img/demokraten/logo_red.png?22611276187) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/demokraten/logo_red.svg?15245860144) center no-repeat, none
        }

        .env--demokraten .Footer-logo, .env--demokraten .Header-logo a {
            width: 110px;
            height: 24px
        }

        .env--lp .Header-logo a {
            background: url(http://cdn.agderposten.no/data/img/lp/logo.png?23664003262) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/lp/logo.svg?72566795554) center no-repeat, none
        }

        .env--lp .Footer-logo {
            background: url(http://cdn.agderposten.no/data/img/lp/logo_black.png?12730683233) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/lp/logo_black.svg?84261109030) center no-repeat, none
        }

        .env--lp .Footer-logo, .env--lp .Header-logo a {
            width: 113px;
            height: 28px
        }

        .Footer:before, .Menu-search:after {
            background: #eee;
            background: rgba(0, 0, 0, .08);
            height: 1px;
            width: 80%;
            position: absolute;
            right: 10%;
            bottom: 0;
            left: 10%
        }

        body, html {
            height: 100%
        }

        .Header, body, html {
            width: 100%
        }

        .Header, .Tortilla {
            position: relative;
        }

        .Footer-content strong, .Header-actions-link, .Header-menu-button, .Menu-list-item, .Menu-list-item--1, .Menu-list-item--2, .Menu-list-item--3, .Menu-list-item--4, .Menu-list-item--5, .Menu-list-item--updated, .Menu-list-item--user, .Menu-search-input, body {
            font-family: FlamaFont, Roboto, helvetica, arial, sans-serif
        }

        .Header-information-category, .Header-information-title, .Menu-heading {
            font-family: 'FlamaFont Slab', 'Roboto Slab', georgia, serif
        }

        @font-face {
            font-family: 'FlamaFont Slab';
            src: url(http://cdn.agderposten.no/data/fonts//flamaslab-extrabold.eot);
            src: url(http://cdn.agderposten.no/data/fonts//flamaslab-extrabold.eot?#iefix) format("embedded-opentype"), url(http://cdn.agderposten.no/data/fonts//flamaslab-extrabold.woff2) format("woff2"), url(http://cdn.agderposten.no/data/fonts//flamaslab-extrabold.woff) format("woff"), url(http://cdn.agderposten.no/data/fonts//flamaslab-extrabold.ttf) format("truetype");
            font-weight: 800;
            font-style: normal
        }

        @font-face {
            font-family: 'FlamaFont Slab';
            src: url(http://cdn.agderposten.no/data/fonts//flamaslab-semibold.eot);
            src: url(http://cdn.agderposten.no/data/fonts//flamaslab-semibold.eot?#iefix) format("embedded-opentype"), url(http://cdn.agderposten.no/data/fonts//flamaslab-semibold.woff2) format("woff2"), url(http://cdn.agderposten.no/data/fonts//flamaslab-semibold.woff) format("woff"), url(http://cdn.agderposten.no/data/fonts//flamaslab-semibold.ttf) format("truetype");
            font-weight: 600;
            font-style: normal
        }

        @font-face {
            font-family: 'FlamaFont Slab';
            src: url(http://cdn.agderposten.no/data/fonts//flamaslab-basic.eot);
            src: url(http://cdn.agderposten.no/data/fonts//flamaslab-basic.eot?#iefix) format("embedded-opentype"), url(http://cdn.agderposten.no/data/fonts//flamaslab-basic.woff2) format("woff2"), url(http://cdn.agderposten.no/data/fonts//flamaslab-basic.woff) format("woff"), url(http://cdn.agderposten.no/data/fonts//flamaslab-basic.ttf) format("truetype");
            font-weight: 400;
            font-style: normal
        }

        @font-face {
            font-family: 'FlamaFont Slab';
            src: url(http://cdn.agderposten.no/data/fonts//flamaslab-light.eot);
            src: url(http://cdn.agderposten.no/data/fonts//flamaslab-light.eot?#iefix) format("embedded-opentype"), url(http://cdn.agderposten.no/data/fonts//flamaslab-light.woff2) format("woff2"), url(http://cdn.agderposten.no/data/fonts//flamaslab-light.woff) format("woff"), url(http://cdn.agderposten.no/data/fonts//flamaslab-light.ttf) format("truetype");
            font-weight: 200;
            font-style: normal
        }

        @font-face {
            font-family: FlamaFont;
            src: url(http://cdn.agderposten.no/data/fonts//flama-extrabold.eot);
            src: url(http://cdn.agderposten.no/data/fonts//flama-extrabold.eot?#iefix) format("embedded-opentype"), url(http://cdn.agderposten.no/data/fonts//flama-extrabold.woff2) format("woff2"), url(http://cdn.agderposten.no/data/fonts//flama-extrabold.woff) format("woff"), url(http://cdn.agderposten.no/data/fonts//flama-extrabold.ttf) format("truetype");
            font-weight: 800;
            font-style: normal
        }

        @font-face {
            font-family: FlamaFont;
            src: url(http://cdn.agderposten.no/data/fonts//flama-semibold.eot);
            src: url(http://cdn.agderposten.no/data/fonts//flama-semibold.eot?#iefix) format("embedded-opentype"), url(http://cdn.agderposten.no/data/fonts//flama-semibold.woff2) format("woff2"), url(http://cdn.agderposten.no/data/fonts//flama-semibold.woff) format("woff"), url(http://cdn.agderposten.no/data/fonts//flama-semibold.ttf) format("truetype");
            font-weight: 600;
            font-style: normal
        }

        @font-face {
            font-family: FlamaFont;
            src: url(http://cdn.agderposten.no/data/fonts//flama-medium.eot);
            src: url(http://cdn.agderposten.no/data/fonts//flama-medium.eot?#iefix) format("embedded-opentype"), url(http://cdn.agderposten.no/data/fonts//flama-medium.woff2) format("woff2"), url(http://cdn.agderposten.no/data/fonts//flama-medium.woff) format("woff"), url(http://cdn.agderposten.no/data/fonts//flama-medium.ttf) format("truetype");
            font-weight: 500;
            font-style: normal
        }

        @font-face {
            font-family: FlamaFont;
            src: url(http://cdn.agderposten.no/data/fonts//flama-light.eot);
            src: url(http://cdn.agderposten.no/data/fonts//flama-light.eot?#iefix) format("embedded-opentype"), url(http://cdn.agderposten.no/data/fonts//flama-light.woff2) format("woff2"), url(http://cdn.agderposten.no/data/fonts//flama-light.woff) format("woff"), url(http://cdn.agderposten.no/data/fonts//flama-light.ttf) format("truetype");
            font-weight: 200;
            font-style: normal
        }

        @font-face {
            font-family: FlamaFont;
            src: url(http://cdn.agderposten.no/data/fonts//flama-lightitalic.eot);
            src: url(http://cdn.agderposten.no/data/fonts//flama-lightitalic.eot?#iefix) format("embedded-opentype"), url(http://cdn.agderposten.no/data/fonts//flama-lightitalic.woff2) format("woff2"), url(http://cdn.agderposten.no/data/fonts//flama-lightitalic.woff) format("woff"), url(http://cdn.agderposten.no/data/fonts//flama-lightitalic.ttf) format("truetype");
            font-weight: 100;
            font-style: italic
        }

        html {
            font: 300 62.5% sans-serif
        }

        body {
            background: #fbfbfb;
            margin: 0;
            font-size: 12pt;
        }

        ::selection {
            background-color: rgba(232, 223, 209, .6)
        }

        ::-moz-selection {
            background-color: rgba(232, 223, 209, .6)
        }

        img {
            vertical-align: top
        }

        blockquote, figcaption, figure, h1, h2, h3, h4, h5, h6, menu, p, ul {
            margin: 0;
            padding: 0
        }

        .Tortilla {
            background: #fbfbfb;
            overflow-x: hidden
        }

        .can--fixed .Tortilla {
            padding-top: 83px
        }

        @media (min-width: 580px) {
            .can--fixed .Tortilla {
                padding-top: 43px
            }
        }
        .Header {
            -moz-backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -moz-transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            background: #fff;
            background: rgba(255, 255, 255, .98);
            height: 83px;
            padding: 8px 0;
            overflow: hidden;
            box-sizing: border-box;
            -moz-box-shadow: 0 2px 6px 0 rgba(0, 0, 0, .05), 0 2px 4px 0 rgba(0, 0, 0, .02), 0 1px 0 0 rgba(0, 0, 0, .05);
            -webkit-box-shadow: 0 2px 6px 0 rgba(0, 0, 0, .05), 0 2px 4px 0 rgba(0, 0, 0, .02), 0 1px 0 0 rgba(0, 0, 0, .05);
            box-shadow: 0 2px 6px 0 rgba(0, 0, 0, .05), 0 2px 4px 0 rgba(0, 0, 0, .02), 0 1px 0 0 rgba(0, 0, 0, .05)
        }

        .env--agderposten .Header {
            background: #0d507a;
            background: rgba(13, 80, 122, .98)
        }

        .env--gat .Header {
            background: #f7f7f7;
            background: rgba(247, 247, 247, .98)
        }

        .env--varden .Header {
            background: #222225;
            background: rgba(34, 34, 37, .98)
        }

        .env--vt .Header {
            background: #A00F2A;
            background: rgba(160, 15, 42, .98)
        }

        .env--demokraten .Header {
            background: #DE1C17;
            background: rgba(222, 28, 23, .98)
        }

        .env--lp .Header {
            background: #2F4A61;
            background: rgba(47, 74, 97, .98)
        }

        .can--fixed .Header {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10
        }

        .Header-content {
            width: 100%;
            max-width: 980px;
            white-space: nowrap;
            margin: auto;
            padding: 0 6px;
            table-layout: fixed;
            vertical-align: middle;
            box-sizing: border-box;
            display: -webkit-flex;
            display: flex;
            -webkit-align-items: flex-start;
            align-items: flex-start;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-flex-direction: row;
            flex-direction: row
        }

        .Menu, .Menu-search {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box
        }

        @media (min-width: 986px) {
            .Header-content {
                padding: 0
            }
        }

        .Header-intro {
            display: table-cell;
            vertical-align: top
        }

        .Header-logo {
            display: inline-block;
            vertical-align: top
        }

        .Header-logo a {
            font-size: 0;
            border: 0;
            display: block
        }

        .env--agderposten .Header-logo a {
            padding-top: 5px
        }

        .env--gat .Header-logo a {
            padding-top: 4px
        }

        .env--demokraten .Header-logo a, .env--lp .Header-logo a, .env--varden .Header-logo a, .env--vt .Header-logo a {
            padding-top: 2px
        }

        .Header-information {
            background: #fbfbfb;
            background: rgba(255, 255, 255, .98);
            white-space: nowrap;
            text-overflow: ellipsis;
            padding: 1.2em;
            position: absolute;
            top: 45px;
            right: 0;
            bottom: 0;
            left: 0;
            overflow: hidden;
            -moz-box-shadow: inset 0 1px rgba(0, 0, 0, .1);
            -webkit-box-shadow: inset 0 1px rgba(0, 0, 0, .1);
            box-shadow: inset 0 1px rgba(0, 0, 0, .1);
            -webkit-flex: 1;
            flex: 1
        }

        @media (min-width: 580px) {
            .Header {
                height: 43px
            }

            .Header-information {
                background: 0 0;
                text-align: center;
                padding: .4em 1.2em 0;
                position: relative;
                top: 0;
                vertical-align: top;
                display: -webkit-flex;
                display: flex;
                -webkit-justify-content: center;
                justify-content: center;
                -webkit-align-items: center;
                align-items: center;
                -moz-box-shadow: none;
                -webkit-box-shadow: none;
                box-shadow: none
            }
        }

        .Header-information-category {
            font-size: 15px;
            font-size: 1.5rem;
            line-height: 1.3em;
            font-weight: 800;
            color: #151617;
            text-transform: uppercase;
            padding: 0 11px 0 0;
            position: relative;
            display: inline-block;
            vertical-align: middle;
            -webkit-flex-shrink: 0;
            flex-shrink: 0
        }

        @media (min-width: 580px) {
            .Header-information-category {
                font-size: 16px;
                font-size: 1.6rem;
                line-height: 1.3em
            }

            .env--agderposten .Header-information-category {
                color: #fff
            }

            .env--gat .Header-information-category {
                color: #151617
            }

            .env--demokraten .Header-information-category, .env--lp .Header-information-category, .env--varden .Header-information-category, .env--vt .Header-information-category {
                color: #fff
            }
        }

        .Header-information-category:after {
            background: #000;
            background: rgba(0, 0, 0, .15);
            width: 1px;
            height: 1.4em;
            margin-top: .5em;
            display: inline-block;
            position: absolute;
            top: -50%;
            right: 0
        }

        .env--agderposten .Header-information-category:after, .env--gat .Header-information-category:after {
            background: #000;
            background: rgba(0, 0, 0, .15)
        }

        .env--varden .Header-information-category:after {
            background: #fff;
            background: rgba(255, 255, 255, .15)
        }

        .env--demokraten .Header-information-category:after, .env--lp .Header-information-category:after, .env--vt .Header-information-category:after {
            background: #000;
            background: rgba(0, 0, 0, .15)
        }

        .Header-information-title {
            font-size: 13px;
            font-size: 1.3rem;
            line-height: 1.2em;
            font-weight: 200;
            color: #151617;
            margin-left: 10px;
            margin-top: -.1em;
            display: inline-block;
            vertical-align: middle
        }

        .Header-actions, .Share, .Share-close {
            vertical-align: top
        }

        @media (min-width: 580px) {
            .Header-information-title {
                font-size: 14px;
                font-size: 1.4rem;
                line-height: 1.2em
            }

            .env--agderposten .Header-information-title {
                color: #fff
            }

            .env--gat .Header-information-title {
                color: #151617
            }

            .env--demokraten .Header-information-title, .env--lp .Header-information-title, .env--varden .Header-information-title, .env--vt .Header-information-title {
                color: #fff
            }
        }

        .Header-actions-item, .Header-actions-item--share, .Header-menu {
            list-style: none;
            display: inline-block;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .11);
            -webkit-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .11);
            box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .11)
        }

        .env--agderposten .Header-actions-item, .env--agderposten .Header-actions-item--share, .env--agderposten .Header-menu {
            -moz-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .17);
            -webkit-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .17);
            box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .17)
        }

        .env--gat .Header-actions-item, .env--gat .Header-actions-item--share, .env--gat .Header-menu {
            -moz-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .11);
            -webkit-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .11);
            box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .11)
        }

        .env--varden .Header-actions-item, .env--varden .Header-actions-item--share, .env--varden .Header-menu {
            -moz-box-shadow: inset 0 0 0 1px rgba(255, 255, 255, .11);
            -webkit-box-shadow: inset 0 0 0 1px rgba(255, 255, 255, .11);
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, .11)
        }

        .env--demokraten .Header-actions-item, .env--demokraten .Header-actions-item--share, .env--demokraten .Header-menu, .env--lp .Header-actions-item, .env--lp .Header-actions-item--share, .env--lp .Header-menu, .env--vt .Header-actions-item, .env--vt .Header-actions-item--share, .env--vt .Header-menu {
            -moz-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .11);
            -webkit-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .11);
            box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .11)
        }

        .not--touch .Header-actions-item--share:hover, .not--touch .Header-actions-item:hover, .not--touch .Header-menu:hover {
            background: #e5e5e5;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none
        }

        .not--touch .env--agderposten .Header-actions-item--share:hover, .not--touch .env--agderposten .Header-actions-item:hover, .not--touch .env--agderposten .Header-menu:hover {
            background: #073850
        }

        .not--touch .env--gat .Header-actions-item--share:hover, .not--touch .env--gat .Header-actions-item:hover, .not--touch .env--gat .Header-menu:hover {
            background: #d9d9d9
        }

        .not--touch .env--varden .Header-actions-item--share:hover, .not--touch .env--varden .Header-actions-item:hover, .not--touch .env--varden .Header-menu:hover {
            background: #181818
        }

        .not--touch .env--vt .Header-actions-item--share:hover, .not--touch .env--vt .Header-actions-item:hover, .not--touch .env--vt .Header-menu:hover {
            background: #8c0d25
        }

        .not--touch .env--demokraten .Header-actions-item--share:hover, .not--touch .env--demokraten .Header-actions-item:hover, .not--touch .env--demokraten .Header-menu:hover {
            background: #B61B1B
        }

        .not--touch .env--lp .Header-actions-item--share:hover, .not--touch .env--lp .Header-actions-item:hover, .not--touch .env--lp .Header-menu:hover {
            background: #243A4D
        }

        .Header-actions-link, .Header-menu-button {
            font-size: 13px;
            font-size: 1.3rem;
            font-weight: 200;
            color: #151617;
            text-decoration: none;
            cursor: pointer;
            padding: 6px 9px;
            display: block
        }

        .env--agderposten .Header-actions-link, .env--agderposten .Header-menu-button {
            color: #fff
        }

        .env--gat .Header-actions-link, .env--gat .Header-menu-button {
            color: #151617
        }

        .env--demokraten .Header-actions-link, .env--demokraten .Header-menu-button, .env--lp .Header-actions-link, .env--lp .Header-menu-button, .env--varden .Header-actions-link, .env--varden .Header-menu-button, .env--vt .Header-actions-link, .env--vt .Header-menu-button {
            color: #fff
        }

        .Header-menu {
            margin-right: 7px;
            -moz-user-select: -moz-none;
            -ms-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            -webkit-align-self: flex-start;
            align-self: flex-start
        }

        .has--js .Header-menu-button:before {
            background: url(http://cdn.agderposten.no/data/img/icon-header-hamburger.png?52511332338) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/icon-header-hamburger.svg?19557896690) center no-repeat, none;
            width: 13px;
            height: 10px;
            margin-left: -1px;
            margin-right: 6px;
            position: relative;
            display: inline-block
        }

        .has--js .env--gat .Header-menu-button:before {
            background: url(http://cdn.agderposten.no/data/img/icon-header-hamburger--black.png?53090322545) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/icon-header-hamburger--black.svg?93107292851) center no-repeat, none
        }

        .has--js.is--menuOpen .Header-menu-button:before {
            background: url(http://cdn.agderposten.no/data/img/icon-header-close.png?57379498840) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/icon-header-close.svg?56026664346) center no-repeat, none
        }

        .has--js.is--menuOpen .env--gat .Header-menu-button:before {
            background: url(http://cdn.agderposten.no/data/img/icon-header-close--black.png?62735855482) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/icon-header-close--black.svg?72823310496) center no-repeat, none;
            background-size: 100% 100%
        }

        .Header-actions {
            text-align: right;
            display: table-cell
        }

        @media (max-width: 580px) {
            .Header-actions {
                -webkit-flex: 1;
                flex: 1
            }
        }

        @media (max-width: 700px) {
            a#orderButton {
                position: relative;
                margin-top: 10px;
                width: 100%;
            }
            input#searchInput {
                width: 70%;
            }
        }

        .Header-actions-item, .Header-actions-item--share {
            text-transform: capitalize;
            margin-left: 7px
        }

        .is--loggedIn .Header-actions-item--share.if--loggedOut, .is--loggedIn .Header-actions-item.if--loggedOut, .is--loggedOut .Header-actions-item--share.if--loggedIn, .is--loggedOut .Header-actions-item.if--loggedIn {
            display: none
        }

        .Header-actions-item--share {
            position: relative
        }

        @media (min-width: 400px) {
            .Header-actions-item--share a:before {
                content: '';
                background: url(http://cdn.agderposten.no/data/img/icon-header-share.png?54758728364) center no-repeat;
                background: url(http://cdn.agderposten.no/data/img/icon-header-share.svg?12239136237) center no-repeat, none;
                width: 15px;
                height: 14px;
                margin-right: 5px;
                display: inline-block;
                vertical-align: top
            }

            .env--gat .Header-actions-item--share a:before {
                background: url(http://cdn.agderposten.no/data/img/icon-header-share--black.png?33463068276) center no-repeat;
                background: url(http://cdn.agderposten.no/data/img/icon-header-share--black.svg?71606209569) center no-repeat, none
            }
        }

        .Header-actions-link {
            line-height: 1.2em
        }

        .Menu {
            background: #fff;
            width: 170px;
            overflow-y: auto;
            border-right: 1px solid #ededed;
            position: fixed;
            top: 0;
            bottom: 0;
            right: 100%;
            z-index: 100;
            will-change: transform, box-shadow;
            -webkit-overflow-scrolling: touch;
            box-sizing: border-box;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none
        }

        .has--transforms .Menu {
            right: auto;
            left: 0;
            -moz-transform: translate(-100%, 0);
            -ms-transform: translate(-100%, 0);
            -webkit-transform: translate(-100%, 0);
            transform: translate(-100%, 0)
        }

        .enable--transition .Menu {
            -moz-transition: -moz-transform .13s, box-shadow .13s;
            -o-transition: -o-transform .13s, box-shadow .13s;
            -webkit-transition: -webkit-transform .13s, box-shadow .13s;
            transition: transform .13s, box-shadow .13s
        }

        .Menu-checkbox {
            position: absolute;
            visibility: hidden;
            filter: alpha(Opacity=0);
            opacity: 0
        }

        .has--transforms.is--menuOpen .Menu {
            left: auto;
            -moz-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0)
        }

        .Content, .Footer, .Header {
            left: 0
        }

        .has--transforms .Content, .has--transforms .Footer, .has--transforms .Header {
            -moz-transition: -moz-transform .13s;
            -o-transition: -o-transform .13s;
            -webkit-transition: -webkit-transform .13s;
            transition: transform .13s
        }

        .is--menuOpen .Content, .is--menuOpen .Footer, .is--menuOpen .Header {
            left: 170px
        }

        .is--menuOpen .Menu {
            right: auto;
            left: 0;
            -moz-box-shadow: 0 4px 12px rgba(0, 0, 0, .05), 0 4px 8px rgba(0, 0, 0, .02), 0 2px 0 rgba(0, 0, 0, .05);
            -webkit-box-shadow: 0 4px 12px rgba(0, 0, 0, .05), 0 4px 8px rgba(0, 0, 0, .02), 0 2px 0 rgba(0, 0, 0, .05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, .05), 0 4px 8px rgba(0, 0, 0, .02), 0 2px 0 rgba(0, 0, 0, .05)
        }

        .has--transforms.is--menuOpen .Content, .has--transforms.is--menuOpen .Footer, .has--transforms.is--menuOpen .Header {
            left: auto;
            -moz-transform: translate(170px, 0);
            -ms-transform: translate(170px, 0);
            -webkit-transform: translate(170px, 0);
            transform: translate(170px, 0)
        }

        .Menu-title {
            display: none
        }

        .Menu-search {
            background: #fbfbfb;
            width: 100%;
            padding: 5px;
            position: relative;
            box-sizing: border-box
        }

        .Menu-search:after {
            bottom: -1px
        }

        .Menu-search-input {
            background: #F3F3F3;
            width: 100%;
            font-size: 13px;
            font-size: 1.3rem;
            line-height: 1em;
            font-weight: 200;
            color: #000;
            padding: 5px 8px;
            border: 1px solid #DDD;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -moz-border-radius: 1px;
            -webkit-border-radius: 1px;
            border-radius: 1px
        }

        .Menu-search-input::-webkit-input-placeholder {
            padding-top: 2px
        }

        .Menu-heading {
            font-size: 11px;
            font-size: 1.1rem;
            line-height: 1em;
            font-weight: 800;
            text-transform: uppercase;
            margin: 0 12px;
            padding: 20px 0 10px;
            border-bottom: 1px solid #F7F7F7
        }

        .Menu-list-item, .Menu-list-item--1, .Menu-list-item--2, .Menu-list-item--3, .Menu-list-item--4, .Menu-list-item--5, .Menu-list-item--updated, .Menu-list-item--user {
            font-size: 15px;
            font-size: 1.5rem;
            line-height: 1em;
            font-weight: 200;
            border-bottom: 1px solid #fdfdfd;
            display: block
        }

        .not--touch .Menu-list-item--1:hover, .not--touch .Menu-list-item--2:hover, .not--touch .Menu-list-item--3:hover, .not--touch .Menu-list-item--4:hover, .not--touch .Menu-list-item--5:hover, .not--touch .Menu-list-item--updated:hover, .not--touch .Menu-list-item--user:hover, .not--touch .Menu-list-item:hover {
            background: #f8f8f8;
            border-color: #f0f0f0;
            -moz-box-shadow: 0 -1px #f0f0f0;
            -webkit-box-shadow: 0 -1px #f0f0f0;
            box-shadow: 0 -1px #f0f0f0
        }

        .is--loggedIn .if--loggedOut.Menu-list-item, .is--loggedIn .if--loggedOut.Menu-list-item--1, .is--loggedIn .if--loggedOut.Menu-list-item--2, .is--loggedIn .if--loggedOut.Menu-list-item--3, .is--loggedIn .if--loggedOut.Menu-list-item--4, .is--loggedIn .if--loggedOut.Menu-list-item--5, .is--loggedIn .if--loggedOut.Menu-list-item--updated, .is--loggedIn .if--loggedOut.Menu-list-item--user, .is--loggedOut .if--loggedIn.Menu-list-item, .is--loggedOut .if--loggedIn.Menu-list-item--1, .is--loggedOut .if--loggedIn.Menu-list-item--2, .is--loggedOut .if--loggedIn.Menu-list-item--3, .is--loggedOut .if--loggedIn.Menu-list-item--4, .is--loggedOut .if--loggedIn.Menu-list-item--5, .is--loggedOut .if--loggedIn.Menu-list-item--updated, .is--loggedOut .if--loggedIn.Menu-list-item--user {
            display: none
        }

        .Menu-list-item a, .Menu-list-item--1 a, .Menu-list-item--2 a, .Menu-list-item--3 a, .Menu-list-item--4 a, .Menu-list-item--5 a, .Menu-list-item--updated a, .Menu-list-item--user a {
            color: #000;
            text-decoration: none;
            padding: 7px 7px 7px 20px;
            white-space: nowrap;
            text-overflow: ellipsis;
            position: relative;
            overflow: hidden;
            display: block
        }

        .Menu-list-item a:before, .Menu-list-item--1 a:before, .Menu-list-item--2 a:before, .Menu-list-item--3 a:before, .Menu-list-item--4 a:before, .Menu-list-item--5 a:before, .Menu-list-item--updated a:before, .Menu-list-item--user a:before {
            content: '';
            background: 0 0;
            width: 5px;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0
        }

        .Menu-list-item--updated {
            position: relative
        }

        .Menu-list-item--updated:after {
            background: #3B90DC;
            width: 7px;
            height: 7px;
            margin-top: -3px;
            position: absolute;
            top: 50%;
            right: 18px;
            -moz-border-radius: 100%;
            -webkit-border-radius: 100%;
            border-radius: 100%
        }

        .Menu-list-item--user {
            text-transform: capitalize
        }

        .Menu-list-item--user a:before {
            background: #fff
        }

        .env--agderposten .Menu-list-item--user a:before {
            background: #0d507a
        }

        .env--gat .Menu-list-item--user a:before {
            background: #f7f7f7
        }

        .env--varden .Menu-list-item--user a:before {
            background: #222225
        }

        .env--vt .Menu-list-item--user a:before {
            background: #A00F2A
        }

        .env--demokraten .Menu-list-item--user a:before {
            background: #DE1C17
        }

        .env--lp .Menu-list-item--user a:before {
            background: #2F4A61
        }

        .Menu-list-item--1 a:before {
            background: #7AAAD5
        }

        .Menu-list-item--2 a:before {
            background: #AED57A
        }

        .Menu-list-item--3 a:before {
            background: #E3D64A
        }

        .Menu-list-item--4 a:before {
            background: #DBA370
        }

        .Menu-list-item--5 a:before {
            background: #DB7070
        }

        .Content {
            width: 100%;
            min-height: 965px;
            position: relative;
            top: -20px;
            background: url(img/background.svg) no-repeat;
            background-size: cover;
            background-position: center;
        }

        .Share {
            background: #fff;
            font-size: 10px;
            font-size: 1rem;
            padding-top: 2px;
            padding-right: 2px;
            border-bottom: 1px solid #fff;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            display: none;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px
        }

        .Share.is--visible {
            display: block
        }

        .Share-close {
            background: #e2e2e2;
            width: 21px;
            height: 20px;
            font-size: 0;
            cursor: pointer;
            margin: 2px 2px 0 4px;
            padding: 4px 4px 4px 5px;
            border: none;
            display: inline-block;
            -moz-border-radius: 1px;
            -webkit-border-radius: 1px;
            border-radius: 1px
        }

        .Share-close:hover {
            -moz-box-shadow: inset 0 0 0 1px #c8c8c8;
            -webkit-box-shadow: inset 0 0 0 1px #c8c8c8;
            box-shadow: inset 0 0 0 1px #c8c8c8
        }

        .Share-close:before {
            background: url(http://cdn.agderposten.no/data/img/icon-header-close--black.png?17981288586) center no-repeat;
            background: url(http://cdn.agderposten.no/data/img/icon-header-close--black.svg?80069047907) center no-repeat, none;
            width: 11px;
            height: 11px;
            display: inline-block
        }

        .Share-facebook, .Share-twitter {
            padding: 0 2px;
            vertical-align: top;
            position: relative;
            bottom: -2px
        }

        .Footer-content strong {
            color: silver;
            text-transform: uppercase
        }

        .Footer {
            background: #fff;
            text-align: center;
            margin-top: 50px;
            padding: 15px 50px 50px;
            position: relative;
            z-index: 3
        }

        .Footer:before {
            top: 0
        }

        .Footer-logo {
            font-size: 0;
            margin: auto;
            display: block
        }

        .Footer-links {
            max-width: 980px;
            margin: 10px auto
        }

        @media (min-width: 750px) {
            .Footer-links {
                display: -webkit-flex;
                display: flex
            }
        }

        .Footer-links-item {
            display: inline-block;
            -webkit-flex: 1;
            flex: 1
        }

        .Footer-links-item a {
            font-size: 14px;
            font-size: 1.4rem;
            line-height: 1.1em;
            color: #000;
            padding: 7px 10px;
            text-decoration: none;
            display: inline-block;
            -moz-border-radius: 1px;
            -webkit-border-radius: 1px;
            border-radius: 1px
        }

        .not--touch .Footer-links-item a:hover {
            background: #eee
        }

        .Footer-content {
            font-size: 16px;
            font-size: 1.6rem;
            line-height: 1.4em;
            padding-top: 10px
        }

        .Footer-content strong {
            font-size: 14px;
            font-size: 1.4rem;
            line-height: 1em;
            font-weight: 400;
            margin-top: 20px
        }

        .Footer-content span {
            font-size: 11px;
            font-size: 1.1rem;
            line-height: 1em;
            color: #bbb;
            margin-bottom: 30px;
            display: block
        }
    </style>

    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <meta name="title" content="{{=title}}">

    <link rel="canonical" href="{{=url}}"/>
    <link rel="shortlink" href="{{=url}}"/>
    <link rel="stylesheet" type="text/css" href="style/style.css" />

    <meta name="description" content="{{=description}}"/>
    <meta name="twitter:description" content="{{=description}}">
    <meta name="author" content="{{=author}}">
    <meta name="application-name" content="{{=site_name}}">

    <meta property="article:published_time" content="{{=date}}">
    <meta property="article:modified_time" content="{{=date}}">
    <meta property="article:tag" content="{{=tag}}">

    <meta property="og:title" content="{{=title}}">
    <meta property="og:type" content="{{=page_type}}">
    <meta property="og:site_name" content="{{=site_name}}">
    <meta property="og:image" content="{{=image_url}}">
    <meta property="og:url" content="{{=url}}">

    <meta name="twitter:title" content="{{=title}}">
    <meta name="twitter:description" content="{{=description}}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image:src" content="{{=image_url}}">
    <meta name="twitter:image:width" content="{{=image_width}}">
    <meta name="twitter:image:height" content="{{=image_height}}">
    <meta name="twitter:site" content="@{{=environment}}">
    <meta name="twitter:domain" content="http://www.{{=environment}}.no">

    {{=icons}}

    <script type="text/javascript">var ADTECH_showAd = function () {
    }</script>

    <script type="text/javascript">
        var NP = NP || {}; //Global namespace
        NP.ready = NP.ready || new Array();
    </script>

    <script type="text/javascript" src="/js/thirdparty/swfobject.js"></script>
    <script type="text/javascript">
        //<![CDATA[
        var cookies;
        function cxGetCookie(name) {
            if (cookies) {
                return cookies[name];
            }
            var c, C, i;

            c = document.cookie.split('; ');
            cookies = {};
            for (i = c.length - 1; i >= 0; i--) {
                C = c[i].split('=');
                cookies[C[0]] = C[1];
            }
            return cookies[name];
        }

        var keyValues = '';
        var domInterest0 = cxGetCookie('domInterest0');
        var domInterest1 = cxGetCookie('domInterest1');
        var domRegion0 = cxGetCookie('domRegion0');
        var domRegion1 = cxGetCookie('domRegion1');
        var domDeviceType0 = cxGetCookie('domDeviceType0');
        var gender = cxGetCookie('gender');
        var ageGroup = cxGetCookie('ageGroup');

        if (domInterest0) {
            keyValues += ';kvinterest=' + domInterest0 + (domInterest1 ? ':' + domInterest1 : '');
        }
        if (domRegion0) {
            keyValues += ';kvregion=' + domRegion0 + (domRegion1 ? ':' + domRegion1 : '');
        }
        if (domDeviceType0) {
            keyValues += ';kvdevicetype=' + domDeviceType0;
        }
        if (gender) {
            keyValues += ';kvgender=' + gender;
        }
        if (ageGroup) {
            keyValues += ';kvagegroup=' + ageGroup;
        }

        document.write("<scr" + "ipt charset=\"ISO-8859-1\" type=\"text/javascript\" src=\"http://adserver.adtech.de/multiad/3.0/1361/0/0/615/mode=multiad;cookie=info;grp=1424;plcids=4200618(size=980x150),4902824(size=980x150),4200614(size=180x500),4200598(size=180x500);key=bildeserier" + keyValues + "\"> </scr" + "ipt>");
        //]]>
    </script>
</head>

<body class="is--loggedOut not--touch">
<div class="Tortilla env--varden">
    <input type="checkbox" id="Menu-checkbox" class="Menu-checkbox">

    <header class="Header">
        <div class="Header-content">
            <div class="Header-intro">
                <menu class="Header-menu">
                    <label id="Header-menu-button" class="Header-menu-button" for="Menu-checkbox">Innhold</label>
                </menu>

                <h1 class="Header-logo">
                    <a data-action="back" data-back="header" href="/">Online Bildearkiv</a>
                </h1>
            </div>

            <div class="Header-information">
                <p class="Header-information-category">
                    Varden
                </p>

                <p class="Header-information-title">
                    Bildearkiv
                </p>
            </div>

            <ul class="Header-actions">
                <li class=Header-actions-item--share>
                    <a id=Header-share class=Header-actions-link data-action=share data-share=header>Del</a>

                    <div id=Header-sharing class=Share>
                        <button class=Share-close>Lukk</button>
                        <iframe class=Share-facebook width=43 height=20
                                src="//www.facebook.com/plugins/share_button.php?href={{url}}&amp;layout=button&amp;appId=260291477395054&amp;locale=nb_NO"
                                data-src="//www.facebook.com/plugins/share_button.php?href={{url}}&amp;layout=button&amp;appId=260291477395054&amp;locale=nb_NO"
                                scrolling=no frameborder=0 style="border:none; overflow:hidden;"
                                allowtransparency=true></iframe>
                        <iframe class=Share-twitter width=55 height=20
                                src="//platform.twitter.com/widgets/tweet_button.html#_=1421142444586&count=none&id=twitter-widget-1&lang=no&original_referer={{url}}&related={{=environment}}&size=m&text={{text}}&url={{url}}&via={{=environment}}"
                                data-src="//platform.twitter.com/widgets/tweet_button.html#_=1421142444586&count=none&id=twitter-widget-1&lang=no&original_referer={{url}}&related={{=environment}}&size=m&text={{text}}&url={{url}}&via={{=environment}}"
                                scrolling=no frameborder=0 style="border:none; overflow:hidden;"
                                allowtransparency=true></iframe>
                    </div>
                </li>

                <li class="Header-actions-item if--loggedOut">
                    <a class="Header-actions-link" href="http://www.{{=environment}}.no/membership/login"
                       data-action="login" data-login="header">Logg inn</a>
                </li>

                <li class="Header-actions-item if--loggedIn">
                    <a class="Header-actions-link content--screenName" href="https://minside.{{environment}}.no"
                       data-action="login" data-login="header"></a>
                </li>
            </ul>
        </div>
    </header>

    <nav class="Menu">
        <h1 class="Menu-title">Navigasjon</h1>

        <h2 class="Menu-heading">Undersider</h2>

        <ul class="Menu-list">
            <li class="Menu-list-item--updated if--loggedOut"><a href="/kjop-tilgang">Kjøp tilgang</a></li>
            <li class="Menu-list-item if--loggedOut"><a href="http://www.{{=environment}}.no/membership/login">Logg
                inn</a></li>
            <li class="Menu-list-item--user if--loggedIn"><a class="content--screenName"
                                                             href="https://minside.{{=environment}}.no">Min Side</a>
            </li>
            <li class="Menu-list-item"><a href="http://sideblikk.{{=environment}}.no/">Sideblikk</a></li>
        </ul>

        <h2 class="Menu-heading">Marked</h2>

        <ul class="Menu-list">
            <li class="Menu-list-item"><a href="/kundesenter">Kundesenter</a></li>
            <li class="Menu-list-item"><a href="http://eavis.{{=environment}}.no/">eAvis</a></li>
            <li class="Menu-list-item"><a href="/kundesenter">Kontakt oss</a></li>
        </ul>

        <h2 class="Menu-heading">Seksjoner</h2>

        <ul class="Menu-list">
            <li class="Menu-list-item--1"><a href="/nyheter">Nyheter</a></li>
            <li class="Menu-list-item--2"><a href="/sport">Sport</a></li>
            <li class="Menu-list-item--3"><a href="/kultur">Kultur</a></li>
            <li class="Menu-list-item--4"><a href="/meninger">Meninger</a></li>
            <li class="Menu-list-item--5"><a href="/magasin">Magasin</a></li>
        </ul>
    </nav>

    <main class="Content">
        <?php include('inc/hoved.php'); ?>
    </main>

    <footer class="Footer">
        <ul class="Footer-links">
            <li class="Footer-links-item"><a href="/kundesenter">Kundesenter</a></li>
            <li class="Footer-links-item"><a href="http://eavis.{{=environment}}.no">eAvis</a></li>
            <li class="Footer-links-item"><a href="http://sideblikk.{{=environment}}.no/">Min Side</a></li>
            <li class="Footer-links-item"><a href="/kundesenter">Annonser</a></li>
            <li class="Footer-links-item"><a href="http://www.pfu.no/simple.php">PFU</a></li>
            <li class="Footer-links-item"><a
                    href="http://presse.no/Etisk-regelverk/Redaktoerplakaten">Redaktørplakaten</a></li>
        </ul>

        <p class="Footer-content">
            <strong>Redaktør:</strong> {{=eic}}<br/>
            <strong>Administrerende direktør:</strong> {{=ceo}}<br/><br/>

            <span>Kopibeskyttet &copy; Agderposten
                <script>
                    var date=new Date();
                    var year = date.getFullYear();
                    document.write(year);
                </script>
            </span>

            <a href="/" data-action="back" data-back="footer" class="Footer-logo">{{=site_name}}</a>
        </p>
    </footer>
</div>
<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/membership.min.js"></script>

<script type='text/javascript'>(function () {
    var logUrl = '/logger/p.gif?a=1.1341860&amp;d=/2.644/2.724',
            referrer = document.referrer;

    if (referrer && referrer.length > 0) {
        logUrl += '&referrer=' + referrer;
    }

    document.write('<img src="' + logUrl + '" />');
})();
</script>

<script src="/js/javascript.min.js"></script>
<script src="/js/video.js"></script>

<script type="application/javascript">
    !function () {
        "use strict";
        var e, t, n, i;
        i = window, n = document, n.body.className = "has--js " + n.body.className, i.raf = function () {
            return i.requestAnimationFrame || i.webkitRequestAnimationFrame || i.mozRequestAnimationFrame || function (e) {
                        return i.setTimeout(e, 16)
                    }
        }(), t = "", e = {
            modules: {}, requirements: [], require: function (e, t) {
                return this.requirements.push({modules: e, callback: t}), this.exported()
            }, exports: function (e, t) {
                var n;
                return this.modules.hasOwnProperty(e) ? console.warn("Module " + e + " already exists") : (this.modules[e] = t(), this.modules[e] && "function" == typeof(n = this.modules[e])._init && n._init(), this.exported())
            }, exported: function () {
                var e;
                for (e = this.requirements.length; e--;)!function (e) {
                    return function (t) {
                        var n, i, r, o, s;
                        if ((i = e.requirements[t]) && i.modules) {
                            for (s = i.modules, r = 0, o = s.length; o > r; r++)if (n = s[r], !e.modules.hasOwnProperty(n))return;
                            return e.requirements.splice(t, 1), i.callback(e.modules)
                        }
                    }
                }(this)(e);
                setTimeout(function (e) {
                    return function () {
                        return 0 === e.requirements.length ? e.loaded() : void 0
                    }
                }(this), 0)
            }, hasLoaded: !1, loaded: function () {
                this.hasLoaded || (this.hasLoaded = !0)
            }
        }, i.App = e, e.require(["DOM", "Event"], function (t) {
            var r, o;
            return r = t.DOM, o = t.Event, e.exports("share", function () {
                var e, t, o, s, u, a, l;
                e = r("#Header-share"), o = r("#Header-sharing"), e.el && o.el && (t = r(o.el.querySelector(".Share-close")), t.el && (e.click(function () {
                    return o.hasClass("is--visible") ? o.removeClass("is--visible") : o.addClass("is--visible")
                }), t.click(function () {
                    return o.removeClass("is--visible")
                }), u = i.location, l = u.protocol + "//" + u.host + u.pathname, s = o.el.querySelector(".Share-facebook"), s.setAttribute("src", s.getAttribute("data-src").replace(/\{\{text}\}/g, encodeURIComponent(n.title)).replace(/\{\{url\}\}/g, encodeURIComponent(l))), a = o.el.querySelector(".Share-twitter"), a.setAttribute("src", a.getAttribute("data-src").replace(/\{\{text}\}/g, encodeURIComponent(n.title)).replace(/\{\{url\}\}/g, encodeURIComponent(l)))))
            })
        }), e.require(["DOM"], function (t) {
            var i;
            return i = t.DOM, e.exports("$body", function () {
                return i(n.body)
            })
        });
        var r = {}.hasOwnProperty;
        e.require(["Event"], function (o) {
            var s;
            return s = o.Event, e.exports("DOM", function () {
                var e, o, u;
                return u = [], e = function () {
                    var e, r;
                    return r = i.getComputedStyle(n.documentElement, t), e = function () {
                        return e = Array.prototype.slice.call(r).join(t).match(/-(moz|webkit|ms)-/) || r.OLink === t && [t, "o"], e[1]
                    }(), e[0].toUpperCase() + e.substr(1)
                }(), o = e.toLowerCase(), function (i, a) {
                    var l, c, h, f;
                    if (!i)return console.warn("DOM: No `el` set");
                    if ("string" == typeof i)if (a) {
                        i = n.createElement(i);
                        for (h in a)r.call(a, h) && (f = a[h], i.setAttribute(h, f))
                    } else i = n.querySelector(i);
                    for (c = u.length; c--;)if ((l = u[c]) && l.el === i)return l;
                    return u.push(l = {
                        el: i, classList: function () {
                            return i && "classList" in i ? i.classList : !1
                        }(), hasClass: function (e) {
                            return this.classList ? this.classList.contains(e) : (" " + this.el.className + " ").indexOf(" " + e + " ") >= 0
                        }, addClass: function (e) {
                            return this.classList ? raf(function (t) {
                                return function () {
                                    return t.classList.add(e)
                                }
                            }(this)) : this.hasClass(e) || raf(function (t) {
                                return function () {
                                    return t.el.className += " " + e
                                }
                            }(this)), this
                        }, removeClass: function (e) {
                            return this.classList ? raf(function (t) {
                                return function () {
                                    return t.classList.remove(e)
                                }
                            }(this)) : this.hasClass(e) && raf(function (t) {
                                return function () {
                                    return t.el.className = (" " + t.el.className + " ").replace(" " + e + " ", " ")
                                }
                            }(this)), this
                        }, style: function (n, i) {
                            var r, s;
                            return null == i && (i = !1), r = n[0].toUpperCase() + n.substr(1), s = function (i) {
                                return function () {
                                    return i.el.style[e + r] || i.el.style[o + r] || i.el.style[n] || t
                                }
                            }(this)(), i ? (s !== i && raf(function (t) {
                                return function () {
                                    return t.el.style[e + r] = i, t.el.style[o + r] = i, t.el.style[n] = i
                                }
                            }(this)), this) : s
                        }, on: function (e, t) {
                            return s.on(e, function (e) {
                                return function (n) {
                                    return s.elementHasTarget(e.el, n.target) ? t.apply(e, arguments) : void 0
                                }
                            }(this), !1, !1, this.el), this
                        }, innerText: function (e) {
                            return null == e && (e = !1), e ? this.innerText() === e ? e : "textContent" in this.el ? this.el.textContent = e : this.el.innerText = e : "textContent" in this.el ? this.el.textContent : this.el.innerText
                        }, click: function (e) {
                            return this.on("click", e)
                        }
                    }), l
                }
            })
        });
        var r = {}.hasOwnProperty;
        e.require(["DOM"], function (t) {
            var n;
            return n = t.DOM, e.exports("DOMINO", function () {
                var e;
                return e = function (t, i, o, s) {
                    var u, a, l, c, h;
                    if (u = n(t, i), "string" == typeof o)u.el.innerHTML = o; else if (o)for (a in o)r.call(o, a) && (h = o[a], u.hasOwnProperty(a) ? console.warn("DOMINO: Property " + a + " already exists in `$DOM`", u) : "object" == typeof h ? ((c = h[1]) && (l = c.dominoClass) && (delete c.dominoClass, c["class"] = u.el.className + "-" + l), u[a] = e.apply(e, h), u.el.appendChild(u[a].el)) : u[a] = h);
                    return s && s.call(u), u
                }
            })
        });
        var o = [].indexOf || function (e) {
                    for (var t = 0, n = this.length; n > t; t++)if (t in this && this[t] === e)return t;
                    return -1
                }, s = [].slice;
        e.exports("Event", function () {
            return {
                _init: function () {
                    try {
                        return n.addEventListener("touchstart", function () {
                        })
                    } catch (e) {
                    }
                },
                events: {
                    window: ["popstate", "resize", "scroll", "load", "hashchange"],
                    self: ["focus", "blur", "load", "input", "change"],
                    fired: {}
                },
                bindings: {},
                bind: function (e, t) {
                    var r;
                    return this.bindings[e] || (this.bindings[e] = []), -1 === e.indexOf(":") && (r = function (r) {
                        return function () {
                            return o.call(r.events.self, e) >= 0 && t ? t : o.call(r.events.window, e) >= 0 ? i : n
                        }
                    }(this)(), "addEventListener" in r ? r.addEventListener(e, function (t) {
                        return function (n) {
                            return t.fire(e, n)
                        }
                    }(this)) : r.attachEvent("on" + e, function (t) {
                        return function (n) {
                            return t.fire(e, n)
                        }
                    }(this))), e
                },
                fire: function () {
                    var e, t, n, i, r;
                    if (r = arguments[0], i = 2 <= arguments.length ? s.call(arguments, 1) : [], this.events.fired[r] = (new Date).getTime(), t = this.bindings[r]) {
                        for (n = t.length; n-- && (e = t[n]);)e.callback.apply(e, i.concat([e])), e.once && t.splice(n, 1);
                        return e
                    }
                },
                time: function (e) {
                    return this.events.fired[e] || !1
                },
                hasFired: function (e) {
                    return !!this.events.fired[e]
                },
                on: function (e, t, n, i, r) {
                    var s, u;
                    return null == n && (n = !1), null == i && (i = !1), "string" != typeof e ? u = function () {
                        var o, u, a;
                        for (a = [], o = 0, u = e.length; u > o; o++)s = e[o], a.push(this.on(s, t, n, i, r));
                        return a
                    }.call(this) : ((!this.bindings[e] || o.call(this.events.self, e) >= 0 && r) && this.bind(e, r), i && this.events.fired[e] ? t() : (this.bindings[e].push({
                        event: e,
                        callback: t,
                        once: n,
                        after: i
                    }), t))
                },
                once: function (e, t) {
                    return this.on(e, t, !0)
                },
                after: function (e, t) {
                    return this.on(e, t, !0, !0)
                },
                remove: function (e) {
                    var t, n, i, r;
                    if (e && (i = e.event) && e.callback && (n = this.bindings[i]))for (r = n.length; r-- && (t = n[r]);)t.callback === e.callback && n.splice(r, 1)
                },
                elementHasTarget: function (e, t) {
                    return e === t ? !0 : t && this.elementHasTarget(e, t.parentNode)
                }
            }
        }), e.require(["Event"], function (t) {
            var n;
            return n = t.Event, e.exports("Pointer", function () {
                return {
                    _init: function () {
                        return this.down = this.down.bind(this), this.move = this.move.bind(this), this.up = this.up.bind(this), n.on("mousedown", this.down), n.on("touchstart", this.down), n.on("mousemove", this.move), n.on("touchmove", this.move), n.on("mouseup", this.up), n.on("touchend", this.up), n.on("touchcancel", this.cancel)
                    },
                    _timeout: null,
                    pointer: {
                        isDragging: !1,
                        position: {
                            now: {x: 0, y: 0, date: null},
                            previous: {x: 0, y: 0, date: null},
                            down: {x: 0, y: 0, date: null},
                            move: {x: 0, y: 0, date: null},
                            up: {x: 0, y: 0, date: null}
                        }
                    },
                    down: function (e) {
                        var t, i, r;
                        return this.pointer.position.previous = this.pointer.position.now, this.pointer.isDragging = !0, e.touches && (t = e.touches[0]) ? (i = t.pageX, r = t.pageY) : (i = e.pageX, r = e.pageY), this.pointer.position.now = this.pointer.position.down = {
                            x: i,
                            y: r,
                            date: new Date
                        }, n.fire("Pointer:down", e, this.pointer)
                    },
                    move: function (e) {
                        var t, i, r;
                        return this.pointer.position.previous = this.pointer.position.now, e.touches && (t = e.touches[0]) ? (i = t.pageX, r = t.pageY) : (i = e.pageX, r = e.pageY), this.pointer.position.now = this.pointer.position.move = {
                            x: i,
                            y: r,
                            date: new Date
                        }, this.pointer.isDragging ? (this._timeout && clearTimeout(this._timeout), n.fire("Pointer:drag", e, this.pointer), this._timeout = setTimeout(function (t) {
                            return function () {
                                return t.cancel(e)
                            }
                        }(this), 700)) : n.fire("Pointer:move", e, this.pointer)
                    },
                    up: function (e) {
                        var t, i, r;
                        return this._timeout && clearTimeout(this._timeout), this.pointer.position.previous = this.pointer.position.now, this.pointer.isDragging = !1, e.touches && (t = e.touches[0]) ? (i = t.pageX, r = t.pageY) : (i = e.pageX, r = e.pageY), this.pointer.position.now = this.pointer.position.up = {
                            x: i,
                            y: r,
                            date: new Date
                        }, n.fire("Pointer:up", e, this.pointer)
                    },
                    cancel: function (e) {
                        return this.pointer.position.previous = this.pointer.position.now, this.pointer.isDragging = !1, n.fire("Pointer:cancel", e, this.pointer)
                    }
                }
            })
        }), e.require(["Event", "DOM", "$body"], function (e) {
            var t, r, o, s, u, a, l, c, h, f, d, p, m, v, g, y, b;
            o = e.Event, r = e.DOM, t = e.$body, p = i.location.search, t.addClass("has--js"), o.on("touchstart", function () {
                return t.removeClass("not--touch")
            }), l = function () {
                var e, t, i, r, o;
                for (e = n.createElement("div"), i = ["webkitTransform", "OTransform", "msTransform", "MozTransform", "transform"], r = 0, o = i.length; o > r; r++)if (t = i[r], void 0 !== e.style[t])return t;
                return !1
            }(), l && r(n.body).addClass("has--transforms"), raf(function () {
                return setTimeout(function () {
                    return t.addClass("enable--transition")
                }, 130)
            }), t.addClass("can--fixed"), f = n.querySelector(".Menu"), d = "is--menuOpen", r(n.getElementById("Header-menu-button")).click(function (e) {
                return "preventDefault" in e ? e.preventDefault() : i.event.returnValue = !1, t.hasClass(d) ? t.removeClass(d) : t.addClass(d)
            }), o.on("click", function (e) {
                var n;
                return n = e.target || window.event.srcElement, f && n && o.elementHasTarget(f, n) ? void 0 : t.removeClass(d)
            }), s = !1, a = 100, u = 20, c = 0, m = function () {
                return setTimeout(function () {
                    var e, r, o, a, l, h;
                    if (!(s || ++c > u)) {
                        if (null == i.polopoly)return m();
                        if (null != (l = i.polopoly.user) ? l.isLoggedIn() : void 0) {
                            for (r = i.polopoly.user.name(), r.toLowerCase && (r = r.toLowerCase()), t.removeClass("is--loggedOut").addClass("is--loggedIn"), h = n.getElementsByClassName("content--screenName"), o = 0, a = h.length; a > o; o++)e = h[o], e.innerHTML = r;
                            s = !0
                        }
                        return m()
                    }
                }, 0 === c ? 0 : a)
            }, m(), b = n.getElementsByTagName("a"), v = function (e) {
                var t, n;
                (t = e.getAttribute("data-action")) && (n = e.getAttribute("data-" + t), r(e).click(function () {
                    return "undefined" != typeof ga && null !== ga ? ga("send", "event", "gallery-neue", t, n) : void 0
                }))
            };
            for (g = 0, y = b.length; y > g; g++)h = b[g], v(h)
        })
    }();
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

{{=ga_script}}
{{=fb_script}}

<script type="text/javascript" src="http://cdn.agp.no/data/js/advert.js"></script>
<script type="text/javascript">
    var isUsingAdBlock = (typeof checkExtension === 'undefined') ? "Blokkerer annonser" : "Viser annonser";
    ga('send', 'event', 'Annonser', 'AdBlock', isUsingAdBlock);
</script>

<script>window.localSiteID = '784241';</script>
<script src="http://aka-cdn-ns.adtech.de/dt/common/DAC.js"></script>
<script src="//cdn.agp.no/data/js/ads/gardr/host.js"></script>
<script src="//cdn.agp.no/data/js/ads/gardr/host-config.js"></script>

<style>
    .apiAdMarkerAbove .ads,
    .apiAdMarkerAbove .ads > div {
        min-height: 150px
    }

    .apiAdMarkerAbove .ads-inited {
        min-height: 0px
    }
</style>

<script type="application/javascript">
    !function e(t, n, r) {
        function a(u, o) {
            if (!n[u]) {
                if (!t[u]) {
                    var l = "function" == typeof require && require;
                    if (!o && l)return l(u, !0);
                    if (i)return i(u, !0);
                    var s = new Error("Cannot find module '" + u + "'");
                    throw s.code = "MODULE_NOT_FOUND", s
                }
                var f = n[u] = {exports: {}};
                t[u][0].call(f.exports, function (e) {
                    var n = t[u][1][e];
                    return a(n ? n : e)
                }, f, f.exports, e, t, n, r)
            }
            return n[u].exports
        }

        for (var i = "function" == typeof require && require, u = 0; u < r.length; u++)a(r[u]);
        return a
    }({
        1: [function (e, t, n) {
            "use strict";
            Object.defineProperty(n, "__esModule", {value: !0}), n["default"] = ""
        }, {}], 2: [function (e, t, n) {
            "use strict";
            Object.defineProperty(n, "__esModule", {value: !0}), n["default"] = document
        }, {}], 3: [function (e, t, n) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {"default": e}
            }

            Object.defineProperty(n, "__esModule", {value: !0});
            var a = e("globals/w"), i = r(a), u = function () {
                for (var e = arguments.length, t = Array(e), n = 0; e > n; n++)t[n] = arguments[n];
                return (i["default"].requestAnimationFrame || i["default"].webkitRequestAnimationFrame || i["default"].mozRequestAnimationFrame || function (e) {
                    i["default"].setTimeout(e, 16)
                }).apply(i["default"], t)
            };
            n["default"] = u
        }, {"globals/w": 4}], 4: [function (e, t, n) {
            "use strict";
            Object.defineProperty(n, "__esModule", {value: !0}), n["default"] = window
        }, {}], 5: [function (e, t, n) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {"default": e}
            }

            function a(e, t) {
                if (!e)return void console.warn(new Error("DOM: No `el` set"));
                (0, l["default"])(e) && (t ? (e = v["default"].createElement(e), (0, u["default"])(t, function (t, n) {
                    e.setAttribute(t, n)
                })) : e = v["default"].querySelectorAll(e)[0]);
                for (var n = P.length; n--;)if (P[n].el === e)return P[n];
                var r = void 0;
                return P.push(r = {
                    el: e, classList: function () {
                        return "classList" in e ? e.classList : !1
                    }(), hasClass: function (e) {
                        return this.classList ? this.classList.contains(e) : (" " + this.el.className + " ").indexOf(" " + e + " ") >= 0
                    }, addClass: function (e, t) {
                        var n = this;
                        return (0, g["default"])(function () {
                            n.classList ? n.classList.add(e) : n.hasClass(e) || (n.el.className += " " + e), (0, f["default"])(t) && t.call(n)
                        }), this
                    }, removeClass: function (e, t) {
                        var n = this;
                        return (0, g["default"])(function () {
                            n.classList ? n.classList.remove(e) : n.hasClass(e) && (n.el.className = (" " + n.el.className + " ").replace(" " + e + " ", " ")), (0, f["default"])(t) && t.call(n)
                        }), this
                    }, style: function (e, t, n) {
                        var r = this, a = this.el, i = (0, A["default"])(e, 1), u = T + i, o = E + i, l = E + e, s = a.style[u] || a.style[o] || a.style[l] || a.style[e] || b["default"], d = void 0;
                        if (!s && "getComputedStyle" in c["default"]) {
                            var p = c["default"].getComputedStyle(this.el, null);
                            d = p[u] || p[o] || p[l] || p[e] || b["default"]
                        }
                        return t ? t && s !== t ? ((0, g["default"])(function () {
                            a.style[u] = t, a.style[o] = t, a.style[l] = t, a.style[e] = t, (0, f["default"])(n) && n.call(r)
                        }), this) : ((0, f["default"])(n) && n.call(this), this) : d || s
                    }, _bind: function (e, t, n) {
                        var r = this;
                        return C["default"][t || "on"](e, function () {
                            for (var e = arguments.length, t = Array(e), a = 0; e > a; a++)t[a] = arguments[a];
                            var i = t[0];
                            i && i.target && !(0, M["default"])(r.el, i.target) || n.apply(r, t)
                        }, this.el), this
                    }, on: function (e, t) {
                        return this._bind(e, "on", t)
                    }, once: function (e, t) {
                        return this._bind(e, "once", t)
                    }
                }), r
            }

            Object.defineProperty(n, "__esModule", {value: !0});
            var i = e("@amphibian/for-own"), u = r(i), o = e("@amphibian/is-string"), l = r(o), s = e("@amphibian/is-function"), f = r(s), d = e("globals/w"), c = r(d), p = e("globals/d"), v = r(p), m = e("globals/raf"), g = r(m), h = e("globals/EMPTY_STRING"), b = r(h), y = e("utility/browserPrefix"), _ = r(y), w = e("utility/elementHasTarget"), M = r(w), O = e("utility/upperCaseString"), A = r(O), x = e("modules/Event"), C = r(x), P = [], T = _["default"], E = T.toLowerCase();
            n["default"] = a
        }, {
            "@amphibian/for-own": 14,
            "@amphibian/is-function": 17,
            "@amphibian/is-string": 18,
            "globals/EMPTY_STRING": 1,
            "globals/d": 2,
            "globals/raf": 3,
            "globals/w": 4,
            "modules/Event": 6,
            "utility/browserPrefix": 8,
            "utility/elementHasTarget": 10,
            "utility/upperCaseString": 13
        }], 6: [function (e, t, n) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {"default": e}
            }

            function a(e) {
                if (Array.isArray(e)) {
                    for (var t = 0, n = Array(e.length); t < e.length; t++)n[t] = e[t];
                    return n
                }
                return Array.from(e)
            }

            function i(e, t) {
                O.bindings[e] || (O.bindings[e] = []);
                var n = function () {
                    return (0, g["default"])(e, O.events.self) && t ? t : (0, g["default"])(e, O.events.window) ? _["default"] : M["default"]
                }(), r = !0;
                if ((0, c["default"])(O.handles, function (t, a, i) {
                            if (t.handle === n) {
                                if ((0, g["default"])(e, t.events))return r = !1, void i();
                                t.events.push(e)
                            }
                        }), r && t !== !1) {
                    O.handles.push({handle: n, events: [e]});
                    var i = function () {
                        for (var t = arguments.length, r = Array(t), i = 0; t > i; i++)r[i] = arguments[i];
                        u.apply(void 0, [e].concat(a(r.concat([n]))))
                    };
                    "addEventListener" in n ? n.addEventListener(e, i) : n.attachEvent("on" + e, i)
                }
            }

            function u(e) {
                for (var t = arguments.length, n = Array(t > 1 ? t - 1 : 0), r = 1; t > r; r++)n[r - 1] = arguments[r];
                var a = void 0;
                if (a = O.bindings[e]) {
                    var i = void 0;
                    n.push(function () {
                        i = !0
                    }), O.hasFired[e] = (new Date).getTime(), (0, c["default"])(a, function (e) {
                        e && !i && e.fire.apply(e, n)
                    })
                }
            }

            function o(e, t, n) {
                if ((0, v["default"])(e))return void(0, c["default"])(e, function (e) {
                    o(e, t, n)
                });
                i(e, n);
                var r = {
                    event: e, callback: t, fire: function () {
                        this.callback.apply(this, arguments)
                    }, remove: function () {
                        f(r)
                    }
                };
                return O.bindings[e].push(r), r
            }

            function l(e, t, n) {
                var r = o(e, t, n);
                return r.callback = function () {
                    for (var e = arguments.length, n = Array(e), a = 0; e > a; a++)n[a] = arguments[a];
                    t.apply(void 0, [function () {
                        r.remove()
                    }].concat(n))
                }, r
            }

            function s(e, t, n) {
                var r = function (e) {
                    for (var n = arguments.length, r = Array(n > 1 ? n - 1 : 0), a = 1; n > a; a++)r[a - 1] = arguments[a];
                    t.apply(void 0, r), e()
                }, a = l(e, r, n);
                O.hasFired.hasOwnProperty(e) && O.hasFired[e] && (a.fire(), a.remove())
            }

            function f(e) {
                var t = void 0;
                (t = O.bindings[e.event]) && (0, b["default"])(t, e)
            }

            Object.defineProperty(n, "__esModule", {value: !0});
            var d = e("@amphibian/iterate-up"), c = r(d), p = e("@amphibian/is-array"), v = r(p), m = e("@amphibian/in-array"), g = r(m), h = e("@amphibian/remove-from-array"), b = r(h), y = e("globals/w"), _ = r(y), w = e("globals/d"), M = r(w), O = {
                events: {
                    self: ["focus", "blur", "load", "input", "change"],
                    window: ["popstate", "resize", "scroll", "load", "hashchange", "drop", "dragover", "beforeunload", "unload", "beforeinstallprompt", "devicelight", "devicemotion", "deviceorientation", "deviceproximity", "languagechange", "paint", "rejectionhandled", "userproximity", "pagehide", "pageshow", "blur"]
                }, handles: [], bindings: {}, hasFired: {}
            };
            n["default"] = {bind: i, fire: u, on: o, once: l, after: s, remove: f}
        }, {
            "@amphibian/in-array": 15,
            "@amphibian/is-array": 16,
            "@amphibian/iterate-up": 20,
            "@amphibian/remove-from-array": 22,
            "globals/d": 2,
            "globals/w": 4
        }], 7: [function (e, t, n) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {"default": e}
            }

            var a = e("globals/w"), i = r(a), u = e("globals/d"), o = r(u), l = e("utility/debounce"), s = r(l), f = e("modules/DOM"), d = r(f), c = (0, d["default"])("#bottomfixedad"), p = o["default"].documentElement;
            c.addClass("is--hidden"), setTimeout(function () {
                c.addClass("is--animated")
            }), window.addEventListener("scroll", (0, s["default"])(function () {
                var e = (i["default"].pageYOffset || p.scrollTop) - (p.clientTop || 0);
                e > 300 ? c.removeClass("is--hidden") : c.addClass("is--hidden")
            }, 500))
        }, {"globals/d": 2, "globals/w": 4, "modules/DOM": 5, "utility/debounce": 9}], 8: [function (e, t, n) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {"default": e}
            }

            Object.defineProperty(n, "__esModule", {value: !0});
            var a = e("globals/w"), i = r(a), u = e("globals/d"), o = r(u), l = e("globals/EMPTY_STRING"), s = r(l), f = e("utility/toArray"), d = r(f), c = e("utility/upperCaseString"), p = r(c);
            n["default"] = function () {
                var e = i["default"].getComputedStyle(o["default"].documentElement, s["default"]), t = ((0, d["default"])(e).join(s["default"]).match(/-(moz|webkit|ms)-/) || e.OLink === s["default"] && [s["default"], "o"])[1];
                return (0, p["default"])(t, 1)
            }()
        }, {
            "globals/EMPTY_STRING": 1,
            "globals/d": 2,
            "globals/w": 4,
            "utility/toArray": 12,
            "utility/upperCaseString": 13
        }], 9: [function (e, t, n) {
            "use strict";
            function r(e, t, n) {
                var r = void 0;
                return function () {
                    var a = this, i = arguments, u = n && !r;
                    clearTimeout(r), r = setTimeout(function () {
                        r = null, n || e.apply(a, i)
                    }, t), u && e.apply(a, i)
                }
            }

            Object.defineProperty(n, "__esModule", {value: !0}), n["default"] = r
        }, {}], 10: [function (e, t, n) {
            "use strict";
            function r(e, t) {
                if (e === t)return !0;
                if (t) {
                    var n = void 0;
                    if (n = t.parentNode)return r(e, t.parentNode)
                }
                return !1
            }

            Object.defineProperty(n, "__esModule", {value: !0}), n["default"] = r
        }, {}], 11: [function (e, t, n) {
            "use strict";
            function r(e) {
                return null !== e && !isNaN(e)
            }

            Object.defineProperty(n, "__esModule", {value: !0}), n["default"] = r
        }, {}], 12: [function (e, t, n) {
            "use strict";
            function r(e) {
                return Array.prototype.slice.call(e)
            }

            Object.defineProperty(n, "__esModule", {value: !0}), n["default"] = r
        }, {}], 13: [function (e, t, n) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {"default": e}
            }

            function a(e, t) {
                return t && (0, u["default"])(t) ? e.substr(0, t).toUpperCase() + e.substr(t) : e.toUpperCase()
            }

            Object.defineProperty(n, "__esModule", {value: !0});
            var i = e("utility/isNumber"), u = r(i);
            n["default"] = a
        }, {"utility/isNumber": 11}], 14: [function (e, t, n) {
            function r(e, t) {
                function n() {
                    r = !1, a = 1 === arguments.length ? arguments[0] : arguments
                }

                var r = !0, a = !1;
                for (var i in e)r && e.hasOwnProperty(i) && t.call(e, i, e[i], n);
                return a ? a : void 0
            }

            t.exports = r
        }, {}], 15: [function (e, t, n) {
            function r(e, t) {
                return -1 !== t.indexOf(e)
            }

            t.exports = r
        }, {}], 16: [function (e, t, n) {
            var r = Object.prototype.toString, a = Array.isArray || function (e) {
                        return "[object Array]" === r.call(e)
                    };
            t.exports = a
        }, {}], 17: [function (e, t, n) {
            function r(e) {
                return "function" == typeof e
            }

            t.exports = r
        }, {}], 18: [function (e, t, n) {
            function r(e) {
                return "string" == typeof e
            }

            t.exports = r
        }, {}], 19: [function (e, t, n) {
            function r(e, t) {
                return a(e.length, -1, function (n, r) {
                    t(e[n], n, r)
                })
            }

            var a = e("@amphibian/iterate");
            t.exports = r
        }, {"@amphibian/iterate": 21}], 20: [function (e, t, n) {
            function r(e, t) {
                return a(e.length, 1, function (n, r) {
                    t(e[n], n, r)
                })
            }

            var a = e("@amphibian/iterate");
            t.exports = r
        }, {"@amphibian/iterate": 21}], 21: [function (e, t, n) {
            function r(e, t, n) {
                function r() {
                    i = !1, a = 1 === arguments.length ? arguments[0] : arguments
                }

                var a, i = !0;
                if (t > 0)for (var u = 0; i && e > u;)n(u, r), u += t; else {
                    if (!(0 > t))throw new Error("iterate: invalid direction " + t);
                    for (var u = e; i && u;)n(u - 1, r), u += t
                }
                return a
            }

            t.exports = r
        }, {}], 22: [function (e, t, n) {
            function r(e, t) {
                a(e, function (n, r, a) {
                    t === n && (e.splice(r, 1), a())
                })
            }

            var a = e("@amphibian/iterate-down");
            t.exports = r
        }, {"@amphibian/iterate-down": 19}]
    }, {}, [7]);
</script>

{{=tns_scripts}}

</body>

<script src="js/lazyload.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/imagesloaded.pkgd.js"></script>
<script src="js/custom.js"></script>

</html>