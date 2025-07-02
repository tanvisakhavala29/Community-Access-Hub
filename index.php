<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Community Access Hub</title>
	<link
		href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<style>
		:root {
			/* Light theme variables */
			--primary-color: #6366F1;
			--primary-dark: #4F46E5;
			--secondary-color: #EC4899;
			--accent-color: #F59E0B;
			--background-color: #F8FAFC;
			--card-background: #FFFFFF;
			--text-primary: #1E293B;
			--text-secondary: #64748B;
			--border-color: #E2E8F0;
			--shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
			--shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
			--shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
			--gradient-primary: linear-gradient(135deg, #6366F1, #EC4899);
			--gradient-secondary: linear-gradient(135deg, #EC4899, #F59E0B);
			--gradient-accent: linear-gradient(135deg, #F59E0B, #6366F1);
			--glass-bg: rgba(255, 255, 255, 0.8);
			--glass-border: rgba(255, 255, 255, 0.2);
			--glass-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
		}

		[data-theme="dark"] {
			--primary-color: #818CF8;
			--primary-dark: #6366F1;
			--secondary-color: #F472B6;
			--accent-color: #FBBF24;
			--background-color: #0F172A;
			--card-background: #1E293B;
			--text-primary: #F8FAFC;
			--text-secondary: #CBD5E1;
			--border-color: #334155;
			--shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.3);
			--shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.4);
			--shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.5);
			--gradient-primary: linear-gradient(135deg, #818CF8, #F472B6);
			--gradient-secondary: linear-gradient(135deg, #F472B6, #FBBF24);
			--gradient-accent: linear-gradient(135deg, #FBBF24, #818CF8);
			--glass-bg: rgba(30, 41, 59, 0.8);
			--glass-border: rgba(255, 255, 255, 0.1);
			--glass-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
		}

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: 'Inter', sans-serif;
			background-color: var(--background-color);
			color: var(--text-primary);
			line-height: 1.6;
			overflow-x: hidden;
			transition: background-color 0.3s ease, color 0.3s ease;
		}

		.navbar {
			background: var(--glass-bg);
			backdrop-filter: blur(20px);
			-webkit-backdrop-filter: blur(20px);
			border-bottom: 1px solid var(--glass-border);
			padding: 1.2rem 2rem;
			position: fixed;
			width: 100%;
			top: 0;
			z-index: 1000;
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
		}

		.navbar.scrolled {
			background: rgba(255, 255, 255, 0.95);
			box-shadow: var(--glass-shadow);
			padding: 1rem 2rem;
		}

		.nav-content {
			max-width: 1400px;
			margin: 0 auto;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.logo {
			font-family: 'Playfair Display', serif;
			font-size: 1.8rem;
			font-weight: 700;
			background: var(--gradient-primary);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			text-decoration: none;
			display: flex;
			align-items: center;
			gap: 0.8rem;
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			position: relative;
		}

		.logo::after {
			content: '';
			position: absolute;
			width: 100%;
			height: 2px;
			bottom: -4px;
			left: 0;
			background: var(--gradient-primary);
			transform: scaleX(0);
			transform-origin: right;
			transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
		}

		.logo:hover::after {
			transform: scaleX(1);
			transform-origin: left;
		}

		.nav-links {
			display: flex;
			gap: 2.5rem;
			align-items: center;
		}

		.nav-link {
			color: var(--text-secondary);
			text-decoration: none;
			font-weight: 500;
			font-size: 1.1rem;
			transition: all 0.3s ease;
			position: relative;
			padding: 0.5rem 0;
		}

		.nav-link::before {
			content: '';
			position: absolute;
			width: 100%;
			height: 2px;
			bottom: 0;
			left: 0;
			background: var(--gradient-primary);
			transform: scaleX(0);
			transform-origin: right;
			transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
		}

		.nav-link:hover {
			color: var(--primary-color);
		}

		.nav-link:hover::before {
			transform: scaleX(1);
			transform-origin: left;
		}

		.hero {
			background: var(--gradient-primary);
			color: white;
			padding: 16rem 2rem 8rem;
			text-align: center;
			position: relative;
			overflow: hidden;
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			perspective: 1000px;
		}

		.hero::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background:
				radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
				radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
			pointer-events: none;
			animation: gradientMove 15s ease infinite;
		}

		@keyframes gradientMove {
			0% {
				transform: translate(0, 0);
			}

			50% {
				transform: translate(5%, 5%);
			}

			100% {
				transform: translate(0, 0);
			}
		}

		.hero-content {
			max-width: 900px;
			margin: 0 auto;
			position: relative;
			z-index: 1;
			transform-style: preserve-3d;
			animation: floatContent 6s ease-in-out infinite;
		}

		@keyframes floatContent {

			0%,
			100% {
				transform: translateY(0) rotateX(0);
			}

			50% {
				transform: translateY(-20px) rotateX(5deg);
			}
		}

		.hero h1 {
			font-family: 'Playfair Display', serif;
			font-size: 5.5rem;
			font-weight: 700;
			margin-bottom: 1.5rem;
			line-height: 1.2;
			animation: fadeInUp 1s ease;
			text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
			background: linear-gradient(45deg, #fff, #f0f0f0);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			transform: translateZ(50px);
		}

		.hero p {
			font-size: 1.4rem;
			margin-bottom: 3rem;
			opacity: 0.9;
			animation: fadeInUp 1s ease 0.2s backwards;
			text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
			max-width: 700px;
			margin-left: auto;
			margin-right: auto;
		}

		.search-container {
			max-width: 700px;
			margin: 0 auto;
			position: relative;
			animation: fadeInUp 1s ease 0.4s backwards;
			transform: translateZ(30px);
		}

		.search-container::before {
			content: '\f002';
			font-family: 'Font Awesome 5 Free';
			font-weight: 900;
			position: absolute;
			left: 1.5rem;
			top: 50%;
			transform: translateY(-50%);
			color: var(--text-secondary);
			font-size: 1.2rem;
		}

		#searchInput {
			width: 100%;
			padding: 1.8rem 2.5rem 1.8rem 4.5rem;
			border: none;
			border-radius: 30px;
			font-size: 1.3rem;
			background: var(--glass-bg);
			backdrop-filter: blur(20px);
			-webkit-backdrop-filter: blur(20px);
			border: 2px solid var(--glass-border);
			color: var(--text-primary);
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
		}

		#searchInput:focus {
			transform: translateY(-4px) scale(1.02);
			box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
			border-color: var(--primary-color);
			background: rgba(255, 255, 255, 0.95);
		}

		#searchInput::placeholder {
			color: var(--text-secondary);
			opacity: 0.7;
		}

		.resources-container {
			max-width: 1400px;
			margin: 6rem auto;
			padding: 0 2rem;
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
			gap: 2.5rem;
		}

		.resource-card {
			background: var(--glass-bg);
			backdrop-filter: blur(20px);
			-webkit-backdrop-filter: blur(20px);
			border: 1px solid var(--glass-border);
			border-radius: 30px;
			padding: 2.5rem;
			box-shadow: var(--glass-shadow);
			transition: all 0.3s ease;
			position: relative;
			overflow: visible;
			animation: fadeInUp 0.8s ease backwards;
		}

		.resource-card:hover {
			transform: translateY(-10px);
			box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
		}

		.resource-content {
			position: relative;
			z-index: 1;
			opacity: 1;
			transform: none;
			transition: none;
		}

		.category-badge {
			display: inline-block;
			padding: 0.8rem 1.5rem;
			border-radius: 9999px;
			font-size: 1rem;
			font-weight: 600;
			background: var(--gradient-secondary);
			color: white;
			margin-bottom: 2rem;
			box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
			letter-spacing: 0.5px;
		}

		.resource-card h2 {
			font-family: 'Playfair Display', serif;
			font-size: 2rem;
			margin-bottom: 1.5rem;
			line-height: 1.3;
			background: var(--gradient-primary);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}

		.resource-meta {
			display: flex;
			flex-wrap: wrap;
			gap: 1rem;
			margin-bottom: 2rem;
		}

		.resource-meta span {
			display: flex;
			align-items: center;
			gap: 0.8rem;
			background: rgba(30, 64, 175, 0.05);
			padding: 1rem 1.5rem;
			border-radius: 15px;
			transition: all 0.3s ease;
			color: var(--primary-color);
			font-weight: 500;
			font-size: 1rem;
			border: 1px solid rgba(30, 64, 175, 0.1);
		}

		.resource-meta span:hover {
			background: rgba(30, 64, 175, 0.1);
			transform: translateY(-2px);
			color: var(--primary-dark);
			border-color: rgba(30, 64, 175, 0.2);
		}

		.resource-description {
			color: var(--text-secondary);
			line-height: 1.8;
			font-size: 1.1rem;
			margin-bottom: 2rem;
			position: relative;
			opacity: 1;
			transform: none;
			transition: none;
			overflow-y: visible;
			z-index: 1;
			display: block;
		}

		.card-actions {
			display: flex;
			gap: 0.8rem;
			margin-top: 1.5rem;
			flex-wrap: wrap;
		}

		.card-actions .button {
			flex: 1;
			min-width: 140px;
			max-width: 200px;
			height: 45px;
			font-size: 0.95rem;
			padding: 0.8rem 1.2rem;
		}

		.card-actions .button.active {
			background: var(--gradient-secondary);
		}

		.favorite-btn {
			position: absolute;
			top: 1rem;
			right: 1rem;
			background: var(--glass-bg);
			border: none;
			width: 35px;
			height: 35px;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
			transition: all 0.3s ease;
			z-index: 2;
			backdrop-filter: blur(5px);
		}

		.favorite-btn i {
			font-size: 1rem;
			color: var(--secondary-color);
			transition: all 0.3s ease;
		}

		.favorite-btn.active i {
			color: #EF4444;
			animation: pulse 0.5s ease;
		}

		.favorite-btn:hover {
			transform: scale(1.1);
			background: var(--glass-bg);
			box-shadow: 0 0 15px rgba(239, 68, 68, 0.3);
		}

		.resource-description {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: var(--glass-bg);
			backdrop-filter: blur(10px);
			-webkit-backdrop-filter: blur(10px);
			padding: 2.5rem;
			border-radius: 30px;
			opacity: 0;
			transform: translateY(20px);
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			overflow-y: auto;
			z-index: 2;
			display: flex;
			flex-direction: column;
			gap: 1.5rem;
		}

		.resource-description::-webkit-scrollbar {
			width: 8px;
		}

		.resource-description::-webkit-scrollbar-track {
			background: rgba(0, 0, 0, 0.1);
			border-radius: 4px;
		}

		.resource-description::-webkit-scrollbar-thumb {
			background: var(--primary-color);
			border-radius: 4px;
		}

		.resource-card:hover .resource-content {
			opacity: 1;
			transform: none;
		}

		.resource-description h3 {
			font-family: 'Playfair Display', serif;
			font-size: 1.8rem;
			margin-bottom: 1rem;
			color: var(--text-primary);
			background: var(--gradient-primary);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}

		.resource-description p {
			color: var(--text-secondary);
			line-height: 1.8;
			font-size: 1.1rem;
			margin-bottom: 1.5rem;
		}

		.resource-description .description-meta {
			display: flex;
			flex-wrap: wrap;
			gap: 1rem;
			margin-top: auto;
		}

		.description-meta span {
			display: flex;
			align-items: center;
			gap: 0.8rem;
			background: rgba(30, 64, 175, 0.05);
			padding: 0.8rem 1.2rem;
			border-radius: 12px;
			color: var(--primary-color);
			font-weight: 500;
			font-size: 0.95rem;
			border: 1px solid rgba(30, 64, 175, 0.1);
		}

		.description-meta span:hover {
			background: rgba(30, 64, 175, 0.1);
			transform: translateY(-2px);
			border-color: rgba(30, 64, 175, 0.2);
		}

		.long-description {
			color: var(--text-secondary);
			margin-bottom: 2.5rem;
			line-height: 1.8;
			font-size: 1.1rem;
		}

		.button {
			background: var(--gradient-primary);
			color: white;
			border: none;
			padding: 0.8rem 1.5rem;
			border-radius: 12px;
			font-weight: 600;
			cursor: pointer;
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			display: inline-flex;
			align-items: center;
			justify-content: center;
			gap: 0.5rem;
			box-shadow: 0 4px 15px rgba(30, 64, 175, 0.3);
			letter-spacing: 0.5px;
			font-size: 1rem;
			position: relative;
			overflow: hidden;
			transform: translateZ(30px);
			min-width: 120px;
			height: 45px;
		}

		.button::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
			transform: translateX(-100%);
			transition: transform 0.6s ease;
		}

		.button:hover {
			transform: translateZ(40px) translateY(-2px) scale(1.05);
			box-shadow: 0 15px 30px -5px rgba(30, 64, 175, 0.4);
		}

		.button:hover::before {
			transform: translateX(100%);
		}

		.button.secondary {
			background: var(--gradient-secondary);
		}

		.button.secondary:hover {
			box-shadow: 0 15px 30px -5px rgba(59, 130, 246, 0.3);
		}

		.feedback-section {
			background: var(--glass-bg);
			backdrop-filter: blur(10px);
			-webkit-backdrop-filter: blur(10px);
			padding: 8rem 2rem;
			margin-top: 6rem;
			position: relative;
			overflow: hidden;
			border-top: 4px solid;
			border-image: var(--gradient-primary) 1;
		}

		.feedback-content {
			max-width: 900px;
			margin: 0 auto;
			text-align: center;
		}

		.feedback-content h2 {
			font-family: 'Playfair Display', serif;
			font-size: 3rem;
			margin-bottom: 3rem;
			background: var(--gradient-primary);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			font-weight: 700;
		}

		#feedbackForm {
			display: flex;
			flex-direction: column;
			gap: 2rem;
		}

		#feedbackInput {
			width: 100%;
			padding: 2rem;
			border: 2px solid var(--border-color);
			border-radius: 20px;
			font-family: inherit;
			font-size: 1.1rem;
			resize: vertical;
			min-height: 180px;
			transition: all 0.4s ease;
			background: rgba(30, 64, 175, 0.02);
			box-shadow: var(--shadow-md);
		}

		#feedbackInput:focus {
			border-color: var(--primary-color);
			box-shadow: 0 0 0 4px rgba(30, 64, 175, 0.1);
			outline: none;
			background: rgba(30, 64, 175, 0.04);
		}

		.notification-section {
			background: var(--gradient-primary);
			color: white;
			padding: 8rem 2rem;
			text-align: center;
			position: relative;
			overflow: hidden;
		}

		.notification-section::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background:
				radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
				radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
			pointer-events: none;
		}

		.notification-content {
			max-width: 700px;
			margin: 0 auto;
			position: relative;
			z-index: 1;
		}

		.notification-content h2 {
			font-family: 'Playfair Display', serif;
			font-size: 3rem;
			margin-bottom: 2rem;
			text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}

		.notification-content p {
			font-size: 1.2rem;
			margin-bottom: 3rem;
			opacity: 0.9;
			text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		}

		#notificationForm {
			display: flex;
			gap: 1.5rem;
			max-width: 600px;
			margin: 0 auto;
		}

		#emailInput {
			flex: 1;
			padding: 1.2rem 2rem;
			border: none;
			border-radius: 16px;
			font-size: 1.1rem;
			box-shadow: var(--shadow-lg);
			transition: all 0.4s ease;
			background: var(--glass-bg);
			backdrop-filter: blur(10px);
			-webkit-backdrop-filter: blur(10px);
			border: 1px solid var(--glass-border);
		}

		#emailInput:focus {
			transform: translateY(-2px);
			box-shadow: 0 15px 30px -5px rgba(0, 0, 0, 0.2);
			outline: none;
			background: white;
			border-color: var(--primary-color);
		}

		footer {
			background: var(--text-primary);
			color: white;
			padding: 4rem 2rem;
			text-align: center;
			position: relative;
			overflow: hidden;
		}

		footer::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			height: 4px;
			background: var(--gradient-secondary);
		}

		.footer-content {
			max-width: 1400px;
			margin: 0 auto;
			display: flex;
			justify-content: space-between;
			align-items: center;
			flex-wrap: wrap;
			gap: 3rem;
		}

		.footer-links {
			display: flex;
			gap: 3rem;
		}

		.footer-links a {
			color: white;
			text-decoration: none;
			opacity: 0.8;
			transition: all 0.3s ease;
			position: relative;
			font-size: 1.1rem;
		}

		.footer-links a::after {
			content: '';
			position: absolute;
			width: 0;
			height: 2px;
			bottom: -4px;
			left: 0;
			background: white;
			transition: width 0.3s ease;
		}

		.footer-links a:hover {
			opacity: 1;
		}

		.footer-links a:hover::after {
			width: 100%;
		}

		.floating-elements {
			position: fixed;
			bottom: 2.5rem;
			right: 2.5rem;
			display: flex;
			flex-direction: column;
			gap: 1.2rem;
			z-index: 1000;
		}

		.floating-button {
			width: 50px;
			height: 50px;
			border-radius: 50%;
			background: var(--gradient-primary);
			color: white;
			border: none;
			cursor: pointer;
			display: flex;
			align-items: center;
			justify-content: center;
			box-shadow: 0 4px 15px rgba(30, 64, 175, 0.3);
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			font-size: 1.4rem;
			transform: translateZ(50px);
		}

		.floating-button:hover {
			transform: translateZ(60px) scale(1.1) rotate(5deg);
			box-shadow: 0 15px 30px -5px rgba(30, 64, 175, 0.4);
		}

		.scroll-to-top {
			display: none;
		}

		.scroll-to-top.visible {
			display: flex;
			animation: fadeIn 0.4s ease;
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
				transform: translateY(20px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		.loading {
			display: none;
			text-align: center;
			padding: 3rem;
		}

		.loading-spinner {
			width: 50px;
			height: 50px;
			border: 3px solid var(--border-color);
			border-top-color: var(--primary-color);
			border-radius: 50%;
			animation: spin 1s linear infinite;
		}

		@keyframes spin {
			to {
				transform: rotate(360deg);
			}
		}

		@keyframes fadeInUp {
			from {
				opacity: 0;
				transform: translateY(30px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		.resource-card:nth-child(1) {
			animation-delay: 0.1s;
		}

		.resource-card:nth-child(2) {
			animation-delay: 0.2s;
		}

		.resource-card:nth-child(3) {
			animation-delay: 0.3s;
		}

		.resource-card:nth-child(4) {
			animation-delay: 0.4s;
		}

		.resource-card:nth-child(5) {
			animation-delay: 0.5s;
		}

		.resource-card:nth-child(6) {
			animation-delay: 0.6s;
		}

		@media (max-width: 768px) {
			.hero h1 {
				font-size: 3rem;
			}

			.nav-links {
				display: none;
			}

			.resources-container {
				grid-template-columns: 1fr;
			}

			#notificationForm {
				flex-direction: column;
			}

			.footer-content {
				flex-direction: column;
				text-align: center;
			}

			.footer-links {
				flex-direction: column;
				gap: 1.5rem;
			}

			.hero {
				padding: 12rem 2rem 6rem;
			}

			.resource-card {
				padding: 2rem;
			}

			.button {
				width: 100%;
				max-width: none;
				min-width: 100%;
			}
		}

		@keyframes float {
			0% {
				transform: translateY(0px);
			}

			50% {
				transform: translateY(-20px);
			}

			100% {
				transform: translateY(0px);
			}
		}

		@keyframes pulse {
			0% {
				transform: scale(1);
			}

			50% {
				transform: scale(1.05);
			}

			100% {
				transform: scale(1);
			}
		}

		@keyframes shine {
			0% {
				background-position: -100% 0;
			}

			100% {
				background-position: 200% 0;
			}
		}

		@keyframes slideIn {
			from {
				transform: translateX(-100%);
				opacity: 0;
			}

			to {
				transform: translateX(0);
				opacity: 1;
			}
		}

		@keyframes fadeInScale {
			from {
				transform: scale(0.9);
				opacity: 0;
			}

			to {
				transform: scale(1);
				opacity: 1;
			}
		}



		.hero-content {
			position: relative;
			z-index: 2;
			max-width: 50%;
			text-align: left;
		}

		.hero h1 {
			font-size: 5rem;
			line-height: 1.1;
			margin-bottom: 2rem;
			background: linear-gradient(45deg, #fff, #f0f0f0);
			background-size: 200% auto;
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			animation: shine 3s linear infinite;
		}

		.resource-card {
			position: relative;
			overflow: visible;
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
		}

		.resource-image {
			width: 100%;
			height: 200px;
			background-size: cover;
			background-position: center;
			border-radius: 20px 20px 0 0;
			transition: transform 0.5s ease;
		}

		.resource-card:hover .resource-image {
			transform: scale(1.1);
		}

		.favorite-btn {
			position: absolute;
			top: 1rem;
			right: 1rem;
			background: var(--glass-bg);
			border: none;
			width: 35px;
			height: 35px;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
			transition: all 0.3s ease;
			z-index: 2;
			backdrop-filter: blur(5px);
		}

		.favorite-btn i {
			font-size: 1rem;
			color: var(--secondary-color);
			transition: all 0.3s ease;
		}

		.favorite-btn.active i {
			color: #EF4444;
			animation: pulse 0.5s ease;
		}

		.favorite-btn:hover {
			transform: scale(1.1);
			background: var(--glass-bg);
			box-shadow: 0 0 15px rgba(239, 68, 68, 0.3);
		}

		.favorites-section {
			position: fixed;
			top: 0;
			right: -400px;
			width: 400px;
			height: 100vh;
			background: var(--glass-bg);
			backdrop-filter: blur(20px);
			-webkit-backdrop-filter: blur(20px);
			padding: 2rem;
			transition: right 0.5s cubic-bezier(0.4, 0, 0.2, 1);
			z-index: 1000;
			overflow-y: auto;
			border-left: 1px solid var(--glass-border);
			box-shadow: -5px 0 30px rgba(0, 0, 0, 0.1);
		}

		.favorites-section.active {
			right: 0;
		}

		.favorites-header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 2rem;
		}

		.close-favorites {
			background: none;
			border: none;
			font-size: 1.5rem;
			cursor: pointer;
			color: var(--text-secondary);
			transition: all 0.3s ease;
		}

		.close-favorites:hover {
			color: var(--primary-color);
			transform: rotate(90deg);
		}

		.favorites-list {
			display: flex;
			flex-direction: column;
			gap: 1rem;
		}

		.favorite-item {
			background: var(--glass-bg);
			padding: 1.5rem;
			border-radius: 20px;
			box-shadow: var(--shadow-sm);
			transition: all 0.3s ease;
			border: 1px solid var(--glass-border);
			transform: translateZ(20px);
		}

		.favorite-item:hover {
			transform: translateZ(30px) translateX(-5px);
			box-shadow: var(--shadow-md);
			border-color: var(--primary-color);
		}

		.favorite-item h3 {
			margin-bottom: 0.5rem;
			color: var(--text-primary);
		}

		.favorite-item p {
			color: var(--text-secondary);
			font-size: 0.9rem;
		}

		.remove-favorite {
			background: none;
			border: none;
			color: #EF4444;
			cursor: pointer;
			padding: 0.5rem;
			transition: all 0.3s ease;
		}

		.remove-favorite:hover {
			transform: scale(1.1);
		}

		/* Add new animations */
		@keyframes glow {
			0% {
				box-shadow: 0 0 5px var(--primary-color);
			}

			50% {
				box-shadow: 0 0 20px var(--primary-color);
			}

			100% {
				box-shadow: 0 0 5px var(--primary-color);
			}
		}

		@keyframes slideUpFade {
			from {
				transform: translateY(20px);
				opacity: 0;
			}

			to {
				transform: translateY(0);
				opacity: 1;
			}
		}

		/* Add new features */
		.theme-switch {
			position: relative;
			width: 60px;
			height: 30px;
			background: var(--glass-bg);
			border-radius: 15px;
			cursor: pointer;
			transition: all 0.3s ease;
		}

		.theme-switch::before {
			content: '';
			position: absolute;
			width: 26px;
			height: 26px;
			border-radius: 50%;
			top: 2px;
			left: 2px;
			background: var(--primary-color);
			transition: all 0.3s ease;
		}

		[data-theme="dark"] .theme-switch::before {
			transform: translateX(30px);
		}

		.resource-card {
			position: relative;
			overflow: visible;
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
		}

		.resource-card::after {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: var(--gradient-primary);
			opacity: 0;
			transition: opacity 0.4s ease;
			z-index: 0;
		}

		.resource-card:hover::after {
			opacity: 0.05;
		}

		.resource-card:hover {
			transform: translateY(-10px);
			box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
		}

		.resource-image {
			position: relative;
			overflow: hidden;
			border-radius: 20px 20px 0 0;
		}

		.resource-image::after {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.3));
			opacity: 0;
			transition: opacity 0.4s ease;
		}

		.resource-card:hover .resource-image::after {
			opacity: 1;
		}

		.favorite-btn {
			position: absolute;
			top: 1rem;
			right: 1rem;
			background: var(--glass-bg);
			border: none;
			width: 35px;
			height: 35px;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
			transition: all 0.3s ease;
			z-index: 2;
			backdrop-filter: blur(5px);
		}

		.favorite-btn i {
			font-size: 1rem;
			color: var(--secondary-color);
			transition: all 0.3s ease;
		}

		.favorite-btn.active i {
			color: #EF4444;
			animation: pulse 0.5s ease;
		}

		.favorite-btn:hover {
			transform: scale(1.1);
			background: var(--glass-bg);
			box-shadow: 0 0 15px rgba(239, 68, 68, 0.3);
		}

		.search-container {
			position: relative;
			max-width: 700px;
			margin: 0 auto;
		}

		.search-container::before {
			content: '\f002';
			font-family: 'Font Awesome 5 Free';
			font-weight: 900;
			position: absolute;
			left: 1.5rem;
			top: 50%;
			transform: translateY(-50%);
			color: var(--text-secondary);
			font-size: 1.2rem;
		}

		#searchInput {
			width: 100%;
			padding: 1.8rem 2.5rem 1.8rem 4.5rem;
			border: none;
			border-radius: 30px;
			font-size: 1.3rem;
			background: var(--glass-bg);
			backdrop-filter: blur(20px);
			-webkit-backdrop-filter: blur(20px);
			border: 2px solid var(--glass-border);
			color: var(--text-primary);
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
		}

		#searchInput:focus {
			transform: translateY(-4px) scale(1.02);
			box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
			border-color: var(--primary-color);
			background: rgba(255, 255, 255, 0.95);
		}

		.loading-spinner {
			width: 50px;
			height: 50px;
			border: 3px solid var(--border-color);
			border-top-color: var(--primary-color);
			border-radius: 50%;
			animation: spin 1s linear infinite;
		}

		@keyframes spin {
			to {
				transform: rotate(360deg);
			}
		}

		/* Add smooth transitions for theme switching */
		body {
			transition: background-color 0.3s ease, color 0.3s ease;
		}

		.resource-card,
		.navbar,
		.feedback-section,
		.notification-section,
		footer {
			transition: all 0.3s ease;
		}

		.card-actions {
			display: flex;
			gap: 0.8rem;
			margin-top: 1.5rem;
			flex-wrap: wrap;
		}

		.card-actions .button {
			flex: 1;
			min-width: 140px;
			max-width: 200px;
			height: 45px;
			font-size: 0.95rem;
			padding: 0.8rem 1.2rem;
		}

		.card-actions .button.active {
			background: var(--gradient-secondary);
		}

		.resource-image {
			width: 100%;
			height: 200px;
			background-size: cover;
			background-position: center;
			border-radius: 20px 20px 0 0;
			margin-bottom: 1.5rem;
			position: relative;
			overflow: hidden;
		}

		.resource-image::after {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.3));
			opacity: 0;
			transition: opacity 0.3s ease;
		}

		.resource-card:hover .resource-image::after {
			opacity: 1;
		}

		.favorite-btn {
			position: absolute;
			top: 1rem;
			right: 1rem;
			background: var(--glass-bg);
			border: none;
			width: 35px;
			height: 35px;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
			transition: all 0.3s ease;
			z-index: 2;
			backdrop-filter: blur(5px);
		}

		.favorite-btn i {
			font-size: 1rem;
			color: var(--secondary-color);
			transition: all 0.3s ease;
		}

		.favorite-btn.active i {
			color: #EF4444;
			animation: pulse 0.5s ease;
		}

		.favorite-btn:hover {
			transform: scale(1.1);
			background: var(--glass-bg);
			box-shadow: 0 0 15px rgba(239, 68, 68, 0.3);
		}

		/* Add new styles for registration form and modal */
		.modal {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.5);
			backdrop-filter: blur(5px);
			z-index: 2000;
			overflow-y: auto;
		}

		.modal.active {
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.modal-content {
			background: var(--glass-bg);
			backdrop-filter: blur(20px);
			-webkit-backdrop-filter: blur(20px);
			border-radius: 30px;
			padding: 3rem;
			width: 90%;
			max-width: 800px;
			position: relative;
			margin: 2rem;
			box-shadow: var(--glass-shadow);
			animation: modalSlideIn 0.3s ease;
		}

		@keyframes modalSlideIn {
			from {
				transform: translateY(-50px);
				opacity: 0;
			}

			to {
				transform: translateY(0);
				opacity: 1;
			}
		}

		.modal-header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 2rem;
		}

		.modal-title {
			font-family: 'Playfair Display', serif;
			font-size: 2.5rem;
			background: var(--gradient-primary);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}

		.close-modal {
			background: none;
			border: none;
			font-size: 1.5rem;
			color: var(--text-secondary);
			cursor: pointer;
			transition: all 0.3s ease;
			width: 35px;
			height: 35px;
			display: flex;
			align-items: center;
			justify-content: center;
			border-radius: 50%;
		}

		.close-modal:hover {
			color: var(--primary-color);
			background: rgba(99, 102, 241, 0.1);
			transform: rotate(90deg);
		}

		.registration-form {
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			gap: 2rem;
		}

		.form-group {
			display: flex;
			flex-direction: column;
			gap: 0.5rem;
		}

		.form-group label {
			font-weight: 600;
			color: var(--text-primary);
		}

		.form-group input,
		.form-group select,
		.form-group textarea {
			padding: 1rem;
			border: 2px solid var(--border-color);
			border-radius: 15px;
			background: var(--glass-bg);
			color: var(--text-primary);
			font-size: 1rem;
			transition: all 0.3s ease;
		}

		.form-group input:focus,
		.form-group select:focus,
		.form-group textarea:focus {
			border-color: var(--primary-color);
			box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
			outline: none;
		}

		.form-group.full-width {
			grid-column: 1 / -1;
		}

		.event-details {
			margin-top: 3rem;
			padding-top: 2rem;
			border-top: 2px solid var(--border-color);
		}

		.event-details h3 {
			font-family: 'Playfair Display', serif;
			font-size: 2rem;
			margin-bottom: 1.5rem;
			background: var(--gradient-secondary);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}

		.event-timeline {
			display: grid;
			gap: 2rem;
			margin-top: 2rem;
		}

		.timeline-item {
			display: grid;
			grid-template-columns: 150px 1fr;
			gap: 2rem;
			padding: 1.5rem;
			background: var(--glass-bg);
			border-radius: 20px;
			transition: all 0.3s ease;
		}

		.timeline-item:hover {
			transform: translateX(10px);
			box-shadow: var(--shadow-md);
		}

		.timeline-date {
			font-weight: 600;
			color: var(--primary-color);
			font-size: 1.1rem;
		}

		.timeline-content h4 {
			margin-bottom: 0.5rem;
			color: var(--text-primary);
		}

		.timeline-content p {
			color: var(--text-secondary);
			line-height: 1.6;
		}

		.prize-pool {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
			gap: 2rem;
			margin-top: 2rem;
		}

		.prize-card {
			background: var(--glass-bg);
			padding: 2rem;
			border-radius: 20px;
			text-align: center;
			transition: all 0.3s ease;
		}

		.prize-card:hover {
			transform: translateY(-5px);
			box-shadow: var(--shadow-lg);
		}

		.prize-rank {
			font-size: 2rem;
			font-weight: 700;
			background: var(--gradient-primary);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			margin-bottom: 1rem;
		}

		.prize-amount {
			font-size: 1.5rem;
			font-weight: 600;
			color: var(--text-primary);
			margin-bottom: 1rem;
		}

		.prize-details {
			color: var(--text-secondary);
			line-height: 1.6;
		}

		.resource-details-content {
			padding: 2rem 0;
		}

		.resource-details-meta {
			margin-bottom: 2rem;
		}

		.resource-details-meta .meta-info {
			display: flex;
			flex-wrap: wrap;
			gap: 1rem;
			margin-top: 1rem;
		}

		.resource-details-meta .meta-info span {
			display: flex;
			align-items: center;
			gap: 0.8rem;
			background: rgba(30, 64, 175, 0.05);
			padding: 1rem 1.5rem;
			border-radius: 15px;
			color: var(--primary-color);
			font-weight: 500;
			font-size: 1rem;
			border: 1px solid rgba(30, 64, 175, 0.1);
		}

		.resource-details-description {
			color: var(--text-secondary);
			line-height: 1.8;
			font-size: 1.1rem;
			margin-bottom: 2rem;
		}

		.resource-details-actions {
			display: flex;
			gap: 0.8rem;
			margin-top: 2rem;
			flex-wrap: wrap;
		}

		.resource-details-actions .button {
			flex: 1;
			min-width: 160px;
			max-width: 200px;
			height: 45px;
			font-size: 0.95rem;
			padding: 0.8rem 1.2rem;
		}

		.resource-details-actions .button.active {
			background: var(--gradient-secondary);
		}

		.resource-details-actions .button.cancel {
			background: var(--text-secondary);
			color: white;
		}

		.resource-details-actions .button.cancel:hover {
			background: var(--text-primary);
			box-shadow: 0 15px 30px -5px rgba(0, 0, 0, 0.2);
		}

		.modal-close {
			position: absolute;
			top: 1.5rem;
			right: 1.5rem;
			background: none;
			border: none;
			font-size: 1.5rem;
			color: var(--text-secondary);
			cursor: pointer;
			transition: all 0.3s ease;
			width: 35px;
			height: 35px;
			display: flex;
			align-items: center;
			justify-content: center;
			border-radius: 50%;
		}

		.modal-close:hover {
			color: var(--primary-color);
			background: rgba(99, 102, 241, 0.1);
			transform: rotate(90deg);
		}

		/* Add these styles for the registration form */
		.modal-subtitle {
			color: var(--text-secondary);
			font-size: 1.1rem;
			margin-top: 0.5rem;
		}

		.registration-form {
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			gap: 1.5rem;
			margin-top: 2rem;
		}

		.form-group {
			display: flex;
			flex-direction: column;
			gap: 0.5rem;
		}

		.form-group label {
			font-weight: 600;
			color: var(--text-primary);
			font-size: 0.95rem;
		}

		.form-group input,
		.form-group select,
		.form-group textarea {
			padding: 0.8rem 1rem;
			border: 2px solid var(--border-color);
			border-radius: 10px;
			background: var(--glass-bg);
			color: var(--text-primary);
			font-size: 1rem;
			transition: all 0.3s ease;
		}

		.form-group input:focus,
		.form-group select:focus,
		.form-group textarea:focus {
			border-color: var(--primary-color);
			box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
			outline: none;
		}

		.form-group.full-width {
			grid-column: 1 / -1;
		}

		.terms-checkbox {
			display: flex;
			align-items: center;
			gap: 0.5rem;
			margin-bottom: 1rem;
		}

		.terms-checkbox input[type="checkbox"] {
			width: 18px;
			height: 18px;
			cursor: pointer;
		}

		.terms-checkbox label {
			font-size: 0.9rem;
			color: var(--text-secondary);
		}

		@media (max-width: 768px) {
			.registration-form {
				grid-template-columns: 1fr;
			}
		}
	</style>
</head>

<body>
	<nav class="navbar">
		<div class="nav-content">
			<a href="#" class="logo">
				Community Access Hub </a>
			<div class="nav-links">
				<button class="button" onclick="toggleFavorites()">
					<i class="fas fa-heart"></i>
					Favorites
				</button>
			</div>
		</div>
	</nav>

	<section class="hero">
		<div class="hero-content">
			<h1>Connect with Your Community</h1>
			<p>Discover local services, events, and resources that make a difference in your life</p>
			<div class="search-container">
				<input type="text" id="searchInput" placeholder="Search for services, events, or resources..."
					aria-label="Search resources">
			</div>
		</div>
		<div class="hero-image"></div>
	</section>

	<div class="favorites-section">
		<div class="favorites-header">
			<h2>Your Favorites</h2>
			<button class="close-favorites" onclick="toggleFavorites()">
				<i class="fas fa-times"></i>
			</button>
		</div>
		<div class="favorites-list" id="favoritesList"></div>
	</div>

	<main id="main-content">
		<div class="loading">
			<div class="loading-spinner"></div>
		</div>
		<div class="resources-container" id="resourcesList"></div>

		<section class="feedback-section">
			<div class="feedback-content">
				<h2>Help Us Improve</h2>
				<form id="feedbackForm">
					<textarea id="feedbackInput" placeholder="Share your thoughts and suggestions..."
						aria-label="Feedback input"></textarea>
					<button type="submit" class="button">
						<i class="fas fa-paper-plane"></i>
						Submit Feedback
					</button>
				</form>
			</div>
		</section>

		<section class="notification-section">
			<div class="notification-content">
				<h2>Stay Updated</h2>
				<p>Subscribe to receive notifications about new services and events in your area</p>
				<form id="notificationForm">
					<input type="email" id="emailInput" placeholder="Enter your email"
						aria-label="Email for notifications" required>
					<button type="submit" class="button secondary">
						<i class="fas fa-bell"></i>
						Subscribe
					</button>
				</form>
			</div>
		</section>
	</main>

	<footer>
		<div class="footer-content">
			<p>© 2024 Community Access Hub. All rights reserved.</p>
			<div class="footer-links">
				<a href="#">Privacy Policy</a>
				<a href="#">Terms of Service</a>
				<a href="#">Contact Us</a>
			</div>
		</div>
	</footer>

	<div class="floating-elements">
		<button class="floating-button scroll-to-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
			<i class="fas fa-arrow-up"></i>
		</button>
		<button class="floating-button" onclick="toggleTheme()">
			<i class="fas fa-moon"></i>
		</button>
	</div>

	<!-- Add resource details modal before closing body tag -->
	<div class="modal" id="resourceDetailsModal">
		<div class="modal-content">
			<button class="modal-close" onclick="closeResourceModal()">
				<i class="fas fa-times"></i>
			</button>
			<div class="modal-header">
				<h2 class="modal-title" id="resourceDetailsTitle"></h2>
			</div>
			<div class="resource-details-content">
				<div class="resource-details-meta">
					<span class="category-badge" id="resourceDetailsCategory"></span>
					<div class="meta-info">
						<span><i class="fas fa-map-marker-alt"></i> <span id="resourceDetailsLocation"></span></span>
						<span><i class="fas fa-phone"></i> <span id="resourceDetailsContact"></span></span>
						<span><i class="fas fa-calendar"></i> <span id="resourceDetailsDate"></span></span>
					</div>
				</div>
				<div class="resource-details-description" id="resourceDetailsDescription"></div>
				<div class="resource-details-actions">
					<button class="button" onclick="toggleFavoriteFromModal()">
						<i class="fas fa-heart"></i>
						<span id="favoriteButtonText">Add to Favorites</span>
					</button>
					<button class="button secondary" onclick="shareResourceFromModal()">
						<i class="fas fa-share-alt"></i>
						Share
					</button>

					<button class="button" onclick="showRegistrationModal(currentResource.title)">
						<i class="fas fa-user-plus"></i>
						Register Now
					</button>

					<button class="button cancel" onclick="closeResourceModal()">
						<i class="fas fa-times"></i>
						Cancel
					</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Add registration modal before closing body tag -->
	<div class="modal" id="registrationModal">
		<div class="modal-content">
			<button class="modal-close" onclick="closeRegistrationModal()">
				<i class="fas fa-times"></i>
			</button>
			<div class="modal-header">
				<h2 class="modal-title" id="registrationTitle">Event Registration</h2>
				<p class="modal-subtitle">Please fill out the form below to register for the event</p>
			</div>
			<form method="post" action="reg.php">
				<div class="registration-form">
					<div class="form-group">
						<label for="fullName">Full Name</label>
						<input type="text" id="fullName" required placeholder="Enter your full name" name="fullname">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" id="email" required placeholder="Enter your email address" Name="email">
					</div>
					<div class="form-group">
						<label for="phone">Phone Number</label>
						<input type="tel" id="phone" required placeholder="Enter your phone number" name="phone">
					</div>
					<div class="form-group">
						<label for="dob">Date of Birth</label>
						<input type="date" id="dob" required name="dob">
					</div>
					<div class="form-group">
						<label for="gender">Gender</label>
						<select id="gender" required name="gender">
							<option value="">Select Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Other</option>
						</select>
					</div>
					<div class="form-group">
						<label for="eventCategory">Event Category</label>
						<select id="eventCategory" required name="eventCategory">
							<option value="">Select Category</option>
							<option value="conference">Conference</option>
							<option value="workshop">Workshop</option>
							<option value="seminar">Seminar</option>
							<option value="hackathon">Hackathon</option>
							<option value="other">Other</option>
						</select>
					</div>
					<div class="form-group">
						<label for="organization">Organization/Institution</label>
						<input type="text" id="organization" placeholder="Enter your organization name"
							name="organization">
					</div>
					<div class="form-group">
						<label for="experience">Years of Experience</label>
						<select id="experience" name="experience">
							<option value="">Select Experience</option>
							<option value="0-1">0-1 years</option>
							<option value="1-3">1-3 years</option>
							<option value="3-5">3-5 years</option>
							<option value="5+">5+ years</option>
						</select>
					</div>
					<div class="form-group full-width">
						<label for="message">Additional Information</label>
						<textarea id="message" rows="4" placeholder="Any specific requirements or questions?"
							name="message"></textarea>
					</div>
					<div class="form-group full-width">
						<div class="terms-checkbox">
							<input type="checkbox" id="terms" required>
							<label for="terms">I agree to the terms and conditions</label>
						</div>
					</div>
					<div class="form-group full-width">
						<button type="submit" class="button" onclick="submitRegistration()">
							<i class="fas fa-paper-plane"></i>
							Submit Registration
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script>
		const resources = [

			{ title: "Gujarat Health & Family Welfare Department", name: "government", category: "Health", image: "https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80", longDescription: "The Gujarat Health & Family Welfare Department is the main governing body responsible for overseeing public health services in the state.<br> It formulates and implements various healthcare policies, programs, and welfare schemes to improve medical facilities across urban and rural areas.<br>The department manages government hospitals, primary health centers (PHCs), community health centers (CHCs), and specialty health institutionIt also ensures access to essential medicines, immunization programs, and public health awareness campaigns.<br>Several health initiatives, such as maternal and child care services, disease control programs, and emergency response systems, fall under its jurisdiction.", location: "Block 5, 3rd Floor, Dr. Jivraj Mehta Bhavan, Gandhinagar, Gujarat", date: "N/A", contact: "79-23253369" },
			{ title: "Gujarat Hackathon 2024", name: "government", category: "Events", image: "https://images.unsplash.com/photo-1504384764586-bb4cdc1707b0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80", longDescription: "Gujarat Hackathon 2024 is the state's premier innovation event bringing together the brightest minds in technology.<br><br>Previous Winners:<br>2023: Team 'TechVision' - Developed an AI-powered healthcare management system<br>2022: Team 'EcoSmart' - Created a sustainable waste management solution<br>2021: Team 'AgriTech' - Built a smart farming platform for rural communities<br><br>This year's theme focuses on Smart Cities and Sustainable Development.<br>Participants will work on solutions for urban challenges, sustainable energy, and digital governance.<br>The hackathon features workshops, mentorship sessions, and networking opportunities with industry leaders.<br>Prizes include cash rewards, incubation opportunities, and potential government project implementations.", location: "Gujarat International Finance Tec-City (GIFT City)", date: "March 15-17, 2024", contact: "www.gujarathackathon.gov.in" },
			{ title: "Apollo Hospitals, Ahmedabad", name: "private", category: "Health", longDescription: "Apollo Hospitals, Ahmedabad, is one of India's leading multispecialty hospitals, offering advanced medical treatments.<br>The hospital provides state-of-the-art facilities in cardiology, oncology, orthopedics, neurology, and more.<br>It is known for its cutting-edge technology, robotic surgeries, and minimally invasive procedures.<br>The hospital has world-class operation theaters, ICUs, and emergency care units.<br>It is accredited by NABH (National Accreditation Board for Hospitals) for high-quality patient care.<br>With internationally trained doctors and specialists, Apollo Hospitals ensures best-in-class medical treatment.", location: " Mahatma Mandir, Gandhinagar", date: "Next in 2026", contact: "79-232-52000" },
			{ title: "Vibrant Gujarat Global Summit", name: "government", category: "Events", longDescription: "The Vibrant Gujarat Global Summit is a prestigious international business event aimed at attracting global investors.<br>First launched in 2003, the summit has become a hub for business networking, economic collaborations, and trade partnerships.<br>It brings together world leaders, CEOs, policymakers, and entrepreneurs to explore investment opportunities in Gujarat.<br>The summit focuses on various industries, including manufacturing, renewable energy, technology, and infrastructure.<br>Apart from business meetings, it also features exhibitions, panel discussions, and startup showcases.<br>The event has played a major role in making Gujarat one of India's fastest-growing economies.", location: "Plot No. 1A, Bhat GIDC Estate, Gandhinagar Highway, Ahmedabad", date: "2003", contact: "79-667-01800" },
			{ title: "Gujarat Business Summit", name: "government", category: "Events", longDescription: "The Gujarat Business Summit is a prestigious annual event bringing together entrepreneurs, corporate leaders, investors, and policymakers.<br>It serves as a networking platform for businesses across various sectors like technology, manufacturing, finance, and healthcare.<br>The summit features keynote speeches, panel discussions, and business matchmaking sessions.<br>It highlights Gujarat's role as an economic powerhouse and explores investment opportunities.<br>Industry experts and government officials discuss market trends, policies, and innovation strategies.<br>Many startups and MSMEs participate to showcase their innovations and attract investors.<br>It helps in strengthening trade relationships between local and international businesses.", location: "Ahmedabad,Gujarat", date: "Annually", contact: "various each year" },
			{ title: "Ahmedabad Community Market", name: "private", category: "Events", longDescription: "The Ahmedabad Community Market is a vibrant marketplace where local artisans, vendors, and small businesses come together to offer a wide range of products. It's the perfect spot to discover unique handmade goods, fresh produce, organic items, clothing, home decor, and more. This market fosters community connection, supporting local businesses and providing a fun, casual shopping experience. Whether you're looking for fresh food, crafts, or just want to browse, this market offers something for everyone. Check for monthly updates on event listings on platforms like Insider to find out when the next one is happening.", location: "Ahmedabad,Gujarat", date: "Check local listings", contact: "Check on www.insider.in" },
			{ title: "British Council Library", name: "private", category: "Resources", longDescription: "The British Council Library in Ahmedabad is an essential resource for book lovers, students, and professionals. Established in the 1950s, this library is a part of the British Council's global mission to promote cultural exchange, education, and learning. It offers an extensive collection of books, magazines, journals, and e-resources, especially in fields such as English literature, arts, science, and business. In addition to providing reading materials, the library also organizes workshops, events, and language classes aimed at improving English proficiency. It's a great space for individuals who want to learn, grow, or simply enjoy a quiet environment for reading and study. Whether you're looking for academic resources or leisure reading, the British Council Library offers something for everyone.", location: "Management Association, ATIRA Campus, Ahmedabad", date: "1950s", contact: "79-2630-0352" },
			{ title: "Public Administration", name: "government", category: "Resources", longDescription: "The District Collector Offices serve as the central hub for public administration in each district. They handle various governmental functions, including addressing public grievances, managing land records, and overseeing disaster management activities. These offices ensure that administrative decisions and policies are implemented at the district level, making them vital to local governance. If you have issues related to public services or need information about land records, the District Collector Offices are your go-to place. These offices also coordinate emergency response efforts during natural disasters, like floods and earthquakes.", location: "Available in all 33 districts of Gujarat", date: "Various", contact: "www.digitalgujarat.gov.in for district-wise details" },
			{ title: "Gujarat University", name: "university", category: "Events", longDescription: "Gujarat University frequently hosts a variety of events, including academic conferences, cultural festivals, and student-driven initiatives. These events provide a platform for intellectual growth, creative expression, and networking opportunities for students and professionals alike. Attendees can engage in workshops, seminars, and exhibitions, making it a hub for educational and social engagement. Stay tuned to their official website or social media pages for event updates.", location: "Gujarat University, Ahmedabad", date: "December 8, 2023", contact: "Not specified" },
			{ title: "Ayushman Bharat", name: "government", category: "Health", longDescription: "This is a government-run health insurance scheme that provides free medical treatment for economically weaker sections.<br>It covers families under two categories: Mukhyamantri Amrutam (MA) Yojana for low-income families in Gujarat and Ayushman Bharat - PMJAY for a broader national coverage.<br>Eligible beneficiaries can receive free medical treatment up to ₹5 lakh per year per family at empaneled hospitals.<br>Treatments include surgeries, critical care, maternity care, and specialized procedures like cancer treatment and organ transplants.<br>The scheme covers both government and private hospitals, ensuring high-quality medical care for those in need.", location: "Health & Family Welfare Department, Gandhinagar", date: "2012", contact: "1800-233-1022" },
			{ title: "Viksit Bharat Sankalp Yatra", name: "government", category: "Events", longDescription: "VBSY is a government-led yatra (journey) aimed at promoting awareness about central and state government schemes across Gujarat.<br>It covers rural and urban regions, ensuring that citizens are informed about welfare programs like free education, health insurance, financial aid, and skill development programs.<br>The campaign organizes public meetings, mobile information centers, and interactive sessions with government officials.<br>Special attention is given to women, farmers, youth, and senior citizens to educate them on relevant schemes.<br>Various departments set up stalls to help people enroll in beneficial schemes on the spot", location: "Rural and urban areas of Gujarat", date: "Ongoing", contact: "www.gujaratindia.gov.in" },
			{ title: "Gujarat Gaurav Divas", name: "government", category: "Events", longDescription: "Gujarat Gaurav Divas is celebrated every year on May 1st to mark the foundation of Gujarat state in 1960.<br>The event highlights Gujarat's cultural heritage, economic growth, and social development.<br>Special celebrations take place in Gandhinagar, Ahmedabad, and other major cities.<br>It includes flag hoisting, cultural performances, parades, and awards for notable citizens.<br>Schools and colleges organize essay competitions, quizzes, and debates on Gujarat's history<br>The state government also announces new development projects and welfare schemes on this occasion.", location: "Statewide (Major events in Gandhinagar)", date: "May 1st (Every year)", contact: "www.gujaratindia.gov.in" },
			{ title: "Sterling Hospitals, Ahmedabad", name: "private", category: "Health", longDescription: "Sterling Hospitals is a renowned private healthcare institution offering multispecialty treatments.<br>It specializes in cardiology, nephrology, neurosurgery, oncology, and gastroenterology.<br>The hospital has 24x7 emergency services, diagnostic labs, and a dedicated critical care unit.<br>With a team of experienced doctors and skilled nursing staff, it provides world-class healthcare services.<br>It is ISO 9001 certified and follows strict protocols for patient safety and infection control.<br>The hospital is well-equipped with advanced medical technology for accurate diagnosis and effective treatment.", location: "Gurukul Road, Memnagar, Ahmedabad", date: "2001", contact: "79-4001-1111" },
			{ title: "Times Business Awards", name: "private", category: "Events", longDescription: "The Times Business Awards is a prestigious event that recognizes and honors outstanding achievements in the business sector across Gujarat. This event brings together entrepreneurs, industry leaders, and innovators to celebrate excellence in various domains such as real estate, healthcare, education, and retail. With inspiring keynote speeches, networking opportunities, and award presentations, this gala is a significant platform for businesses to gain recognition and connect with like-minded professionals.", location: "Ahmedabad", date: "Annually", contact: "www.timesbusinessawards.com" },
			{ title: "Surat Entrepreneurs Meetup", name: "private", category: "Events", longDescription: "Surat Entrepreneurs Meetup brings together business enthusiasts, entrepreneurs, and professionals from various industries. This event is great for networking, sharing ideas, and discussing the challenges and opportunities in the business world. Whether you're a startup founder or a seasoned business owner, this meetup provides a platform for growth, learning, and collaboration. The quarterly meetups often feature guest speakers, workshops, and panel discussions. It's an excellent opportunity to connect with like-minded individuals and explore business ventures in Surat. You can find more details and register for the event on Meetup.com.", location: "Surat, Gujarat", date: "Quarterly", contact: "www.meetup.com" },
			{ title: "Ahmedabad Book Club", name: "private", category: "Resources", longDescription: "The Ahmedabad Book Club is a community-driven initiative where people who love books come together to discuss their favorite reads, explore new genres, and share recommendations. Monthly events are held across various locations in Ahmedabad, making it convenient for book enthusiasts to participate. The club fosters a spirit of learning and camaraderie, allowing individuals to dive deeper into literature and engage in enriching conversations with fellow readers. Whether you're an avid reader or just beginning your literary journey, this club offers a welcoming space to expand your literary horizons. The discussions often cover a wide range of topics, from fiction to non-fiction, and even specialized genres like history, philosophy, and self-help.", location: "Multiple locations in Ahmedabad", date: "Monthly events", contact: "www.meetup.com" },
			{ title: "Gujarat Technological University", name: "university", category: "Events", longDescription: "Gujarat Technological University hosts a range of events throughout the year, including technical festivals, innovation challenges, industry summits, and academic conferences. These events provide students and professionals with opportunities to showcase their skills, engage in research, and collaborate on innovative projects. GTU's initiatives focus on promoting technological advancements, entrepreneurship, and skill development, making it a hub for future-focused learning.Would you like the next topic's details?", location: "Gujarat Technological University", date: "February 18, 2025", contact: "Not specified" },
			{ title: "Shalby Hospitals, Ahmedabad", name: "private", category: "Health", longDescription: "Shalby Hospitals is one of India's leading orthopedic and joint replacement centers.<br>It is internationally recognized for hip and knee replacement surgeries.<br>Apart from orthopedics, the hospital offers treatments in cardiology, oncology, neurology, and general medicine.<br>The hospital has modern ICUs, operation theaters, and a robotic surgery center.<br>It provides comprehensive rehabilitation services to ensure faster recovery for patients.<br>With a high success rate in complex surgeries, it is trusted by patients from across the country.", location: "SG Highway, Ahmedabad", date: "1994", contact: "99240-22299" },
			{ title: "Vegan & Organic Lifestyle Festival", name: "private", category: "Events", longDescription: "The Vegan & Organic Lifestyle Festival is a celebration of healthy, sustainable, and eco-friendly living. This annual festival promotes veganism, organic food, sustainable practices, and environmentally conscious living. Visitors can explore food stalls offering delicious vegan dishes, organic products, and learn about the benefits of adopting a plant-based lifestyle. There are also workshops on how to transition to an organic lifestyle, eco-friendly products, and more. The event is ideal for individuals interested in health, sustainability, and making mindful choices for a better planet. You can stay updated by visiting the Vibrant Events website.", location: "Ahmedabad, Vadodara, Surat", date: "Annually (Varies)", contact: "www.vibrantevents.com" },
			{ title: "National Forensic Sciences University (NFSU)", name: "university", category: "Events", longDescription: "The National Forensic Sciences University organizes specialized events focusing on forensic science, cybersecurity, criminology, and related fields. These include seminars, workshops, and international conferences that bring together experts, students, and law enforcement professionals. Events often feature hands-on training, expert talks, and research presentations, making NFSU a hub for advancing knowledge in forensic science and technology.", location: "National Forensic Sciences University, Gandhinagar Campus", date: "November 8-10, 2022", contact: "Not specified" },
			{ title: "CIMS Hospital, Ahmedabad", name: "private", category: "Health", longDescription: "CIMS Hospital is a multi-super specialty hospital offering world-class medical care.<br>It has cutting-edge technology and advanced healthcare infrastructure.<br>The hospital provides treatments in cardiology, oncology, urology, nephrology, and pediatrics.<br>It has internationally accredited laboratories ensuring accurate diagnostics.<br>The emergency department operates 24x7 with specialized trauma care services.<br>CIMS is known for its expert doctors, personalized patient care, and high recovery rates.", location: "Science City Road, Sola, Ahmedabad, Gujarat", date: "2010", contact: "98250-66661" },
			{ title: "TEDxAhmedabad", name: "private", category: "Events", longDescription: "TEDxAhmedabad is an independently organized TED event featuring thought-provoking talks.<br>It showcases inspiring speakers from diverse fields such as technology, arts, social impact, and science.<br>The event promotes ideas worth spreading through powerful storytelling and personal experiences.<br>Attendees gain valuable insights into innovation, creativity, and problem-solving.<br>It attracts students, professionals, and entrepreneurs eager to learn from industry leaders.<br>The event includes interactive networking sessions and a chance to engage with speakers.", location: "Ahmedabad, Gujarat", date: "Annually (Varies)", contact: "www.tedxahmedabad.com" },
			{ title: "Blood Donation Drives by Private NGOs", name: "private", category: "Events", longDescription: "Blood donation drives are regularly organized across Gujarat by various private NGOs like Prathama Blood Centre to support hospitals in need of blood donations. Donating blood is a simple yet life-saving act that helps individuals undergoing surgeries, accident victims, and those suffering from medical conditions requiring blood transfusions. These drives are held in various cities, and donors are encouraged to participate. It's an opportunity to make a positive impact and contribute to the wellbeing of your community. You can contact Prathama Blood Centre in Ahmedabad for more information and to know the nearest donation drives.", location: "Multiple cities in Gujarat", date: "Regularly organized by NGOs", contact: "79-2691-1401" },
			{ title: "The Hive (Co-Working Space)", name: "private", category: "Resources", longDescription: "The Hive is a popular co-working space in Ahmedabad, located in the bustling Prahlad Nagar area. Established in 2017, it provides a collaborative work environment for freelancers, entrepreneurs, and startups. The space offers flexible working arrangements, from hot desks to private offices, making it ideal for individuals or small teams looking for an affordable yet professional working environment. Beyond just office space, The Hive also fosters a community-driven atmosphere, where members can network, collaborate, and access various business resources and events. It's more than just a place to work; it's a hub for innovation and entrepreneurship in the heart of Ahmedabad. Whether you're running your own business or just starting out, The Hive provides the perfect environment to grow and thrive.", location: "Prahlad Nagar, Ahmedabad", date: "2017", contact: "79-4003-2300" },
			{ title: "Central University of Gujarat (CUG)", name: "university", category: "Events", longDescription: "The Central University of Gujarat hosts a variety of events, including academic conferences, cultural festivals, literary gatherings, and research symposiums. These events provide a platform for students, scholars, and professionals to engage in meaningful discussions, showcase their research, and participate in cultural exchanges. The university's focus on interdisciplinary learning ensures events cater to diverse academic interests and social causes.", location: "MMTTC, Central University of Gujarat, Gandhinagar, Gujarat", date: "March 3-12, 2025", contact: "Not specified" },
			{ title: "Rann Utsav (White Desert Festival)", name: "private", category: "Events", longDescription: "Rann Utsav is a unique cultural festival held in the white salt desert of Kutch.<br>It offers luxury tent accommodations, camel rides, adventure sports, and traditional handicrafts.<br>The festival showcases Gujarati folk music, dance performances, and art exhibitions.<br>Tourists enjoy stunning sunrise and sunset views over the white desert.<br>Activities include paramotoring, ATV rides, star gazing, and cultural workshops.<br>The event promotes Gujarat's heritage tourism and provides an opportunity to explore local crafts and cuisine.", location: "Dhordo, Kutch", date: "November to February (Every year)", contact: "79-239-77200" },
			{ title: "Zydus Hospital, Ahmedabad", name: "private", category: "Health", longDescription: "The Gujarat Gyan Shakti Program is an education awareness campaign to promote quality education and skill development.<br>It includes career guidance workshops, scholarships, teacher training programs, and digital learning initiatives.<br>Special sessions help students choose the right career paths based on their interests and strengths.<br>The program also educates parents on the importance of regular schooling and higher education.<br>Government schools are provided with smart classrooms, free textbooks, and better teaching facilities.", location: "S.G. Highway, Ahmedabad, Gujarat", date: "2016", contact: "79-6619-0202" },
			{ title: "Surat Smart City Innovation Lab", name: "private", category: "Resources", longDescription: "The Surat Smart City Innovation Lab, established in 2016, is a pioneering initiative aimed at making Surat a smarter, more sustainable city. Located at the Science Centre in Surat, the lab serves as a testing ground for new technologies and ideas that can improve urban living. From innovations in waste management to smart transportation solutions, this lab explores a wide range of concepts designed to enhance the city's infrastructure, governance, and environment. The lab also works closely with various stakeholders, including government agencies, tech companies, and citizens, to ensure that the innovations are practical and effective in solving real-world problems. If you're interested in urban development, technology, or sustainable solutions, the Surat Smart City Innovation Lab is a place to watch", location: "Science Centre, Surat", date: "2016", contact: "www.suratsmartcity.com" },
			{ title: "Government Agriculture Offices", name: "government", category: "Resources", longDescription: "The Agriculture Offices in Gujarat provide various services aimed at supporting farmers and improving agricultural productivity. Services include assistance with government schemes for farmers, soil testing, and providing subsidies for agricultural equipment and resources. These offices also play a crucial role in advising farmers about crop selection, irrigation practices, pest control, and weather forecasts. By providing these resources, the Agriculture Offices help ensure the sustainability of agriculture in the state.", location: "Present in all districts", date: "N/A", contact: "www.agri.gujarat.gov.in" },
			{ title: "Gujarat Urban Health Project (GUHP)", name: "government", category: "Health", longDescription: "This project aims to provide quality healthcare services to the urban population in Gujarat.<br>It focuses on setting up Urban Health Centers (UHCs) to offer affordable medical check-ups, vaccinations, maternity care, and disease control programs.<br>The initiative improves healthcare accessibility for slum dwellers and low-income families in city areas.<br>It also ensures early diagnosis and treatment of diseases, reducing the burden on major government hospitals.", location: "Various Urban Health Centers in Gujarat", date: "Ongoing initiative", contact: "Visit nearest Urban Health Center" },
			{ title: "Gujarat Gyan Shakti Program (Education Awareness Initiative)", name: "government", category: "Event", longDescription: "The Gujarat Gyan Shakti Program is an education awareness campaign to promote quality education and skill development.<br>It includes career guidance workshops, scholarships, teacher training programs, and digital learning initiatives.<br>Special sessions help students choose the right career paths based on their interests and strengths.<br>The program also educates parents on the importance of regular schooling and higher education.<br>Government schools are provided with smart classrooms, free textbooks, and better teaching facilities.", location: "Various government schools & colleges", date: "Ongoing throughout the year", contact: "79-232-53834" },
			{ title: "Ahmedabad Management Association", name: "private", category: "Resources", longDescription: "The Ahmedabad Management Association (AMA) is a premier institution for management education and professional development.<br>It offers various management programs, workshops, and seminars for working professionals.<br>The association provides networking opportunities and industry insights through regular events.<br>It has a well-equipped library and digital resources for research and learning.<br>AMA also conducts corporate training programs and leadership development workshops.", location: "Ahmedabad Management Association Campus, Vastrapur", date: "1964", contact: "79-2630-0352" },
			{ title: "Gujarat Chamber of Commerce & Industry", name: "private", category: "Resources", longDescription: "The Gujarat Chamber of Commerce & Industry (GCCI) is a leading business organization promoting trade and commerce in Gujarat.<br>It provides business networking opportunities, trade facilitation services, and policy advocacy.<br>The chamber organizes business meets, exhibitions, and trade fairs throughout the year.<br>It offers business support services, including documentation assistance and market research.<br>GCCI also conducts training programs for MSMEs and startup entrepreneurs.", location: "Ashram Road, Ahmedabad", date: "1949", contact: "79-2754-3232" },
			{ title: "Ahmedabad University", name: "university", category: "Events", longDescription: "Ahmedabad University hosts various academic and cultural events throughout the year.<br>The university organizes international conferences, research symposiums, and industry-academia meets.<br>It conducts workshops on entrepreneurship, innovation, and sustainable development.<br>The university's cultural festivals showcase student talent in arts, music, and theater.<br>Regular career fairs and placement drives connect students with industry opportunities.", location: "Ahmedabad University Campus, Navrangpura", date: "2009", contact: "79-6191-1000" },
			{ title: "Nirma University", name: "university", category: "Events", longDescription: "Nirma University is known for its technical and management education excellence.<br>The university hosts national and international conferences on engineering and technology.<br>It organizes technical festivals, hackathons, and innovation challenges.<br>Regular industry interaction programs and alumni meets are conducted.<br>The university's cultural and sports events promote holistic development.", location: "Sarkhej-Gandhinagar Highway, Ahmedabad", date: "2003", contact: "79-3064-2700" },
			{ title: "Gujarat National Law University", name: "university", category: "Events", longDescription: "Gujarat National Law University (GNLU) conducts various legal education and research events.<br>The university hosts national and international law conferences and moot courts.<br>It organizes legal awareness programs and community outreach initiatives.<br>Regular workshops on contemporary legal issues and policy debates are held.<br>GNLU's cultural and sports events foster student engagement and leadership.", location: "Gandhinagar, Gujarat", date: "2003", contact: "79-2327-6611" },
			{ title: "Ahmedabad Textile Industry's Research Association", name: "private", category: "Resources", longDescription: "ATIRA is a premier research organization for the textile industry.<br>It provides technical consulting, testing services, and research facilities.<br>The association conducts training programs for textile professionals.<br>It offers laboratory services for quality control and product development.<br>ATIRA also organizes industry seminars and technical workshops.", location: "Ahmedabad Textile Industry's Research Association Campus", date: "1947", contact: "79-2748-0501" },
			{ title: "Gujarat Innovation Society", name: "private", category: "Resources", longDescription: "The Gujarat Innovation Society promotes innovation and entrepreneurship in the state.<br>It provides incubation facilities and mentorship for startups.<br>The society organizes innovation challenges and hackathons.<br>It offers training programs in design thinking and innovation management.<br>Regular networking events connect innovators with industry experts.", location: "Gandhinagar, Gujarat", date: "2015", contact: "79-2325-0500" }

		];

		let favorites = JSON.parse(localStorage.getItem('favorites')) || [];

		let currentResource = null;

		function renderResources(filteredResources) {
			const container = document.getElementById('resourcesList');
			container.innerHTML = '';

			filteredResources.forEach((resource, index) => {
				const isFavorite = favorites.includes(resource.title);
				const card = document.createElement('article');
				card.className = 'resource-card';
				card.style.animationDelay = `${index * 0.1}s`;

				// Add click handler for all cards
				card.onclick = () => showResourceDetails(resource);

				card.innerHTML = `
					<div class="resource-content">
						<button class="favorite-btn ${isFavorite ? 'active' : ''}" onclick="event.stopPropagation(); toggleFavorite('${resource.title}')">
							<i class="fas fa-heart"></i>
						</button>
						<span class="category-badge">${resource.category}</span>
						<h2>${resource.title}</h2>
						<div class="resource-meta">
							<span><i class="fas fa-map-marker-alt"></i> ${resource.location}</span>
							<span><i class="fas fa-phone"></i> ${resource.contact}</span>
							<span><i class="fas fa-calendar"></i> ${resource.date}</span>
						</div>
						<div class="resource-description">
							${resource.longDescription}
						</div>
						<div class="card-actions">
							<button onclick="event.stopPropagation(); toggleFavorite('${resource.title}')" class="button ${isFavorite ? 'active' : ''}">
								<i class="fas fa-heart"></i>
								${isFavorite ? 'Remove from Favorites' : 'Add to Favorites'}
							</button>
							<button onclick="event.stopPropagation(); shareResource('${resource.title}')" class="button secondary">
								<i class="fas fa-share-alt"></i>
								Share
							</button>
							${resource.category === 'Events' ? `
							<button onclick="event.stopPropagation(); showRegistrationModal('${resource.title}')" class="button">
								<i class="fas fa-user-plus"></i>
								Register
							</button>
							` : ''}
						</div>
					</div>
				`;
				container.appendChild(card);
			});
		}

		function toggleFavorite(title) {
			const index = favorites.indexOf(title);
			if (index === -1) {
				favorites.push(title);
			} else {
				favorites.splice(index, 1);
			}
			localStorage.setItem('favorites', JSON.stringify(favorites));
			renderResources(resources);
			renderFavorites();
		}

		function renderFavorites() {
			const container = document.getElementById('favoritesList');
			container.innerHTML = '';

			favorites.forEach(title => {
				const resource = resources.find(r => r.title === title);
				if (resource) {
					const item = document.createElement('div');
					item.className = 'favorite-item';
					item.innerHTML = `
						<h3>${resource.title}</h3>
						<p>${resource.category}</p>
						<button class="remove-favorite" onclick="toggleFavorite('${resource.title}')">
							<i class="fas fa-times"></i>
						</button>
					`;
					container.appendChild(item);
				}
			});
		}

		function toggleFavorites() {
			const favoritesSection = document.querySelector('.favorites-section');
			favoritesSection.classList.toggle('active');
		}

		function filterResources() {
			const searchTerm = document.getElementById('searchInput').value.toLowerCase();
			const loading = document.querySelector('.loading');
			loading.style.display = 'block';

			setTimeout(() => {
				const filtered = resources.filter(resource => {
					return resource.title.toLowerCase().includes(searchTerm) ||
						resource.longDescription.toLowerCase().includes(searchTerm) ||
						resource.category.toLowerCase().includes(searchTerm);
				});
				renderResources(filtered);
				loading.style.display = 'none';
			}, 500);
		}

		document.getElementById('searchInput').addEventListener('input', filterResources);

		function shareResource(resourceTitle) {
			if (navigator.share) {
				navigator.share({
					title: resourceTitle,
					text: `Check out ${resourceTitle} on Community Access Hub!`,
					url: window.location.href
				});
			} else {
				const shareMenu = document.createElement('div');
				shareMenu.className = 'share-menu';
				shareMenu.innerHTML = `
					<div class="share-options">
						<button onclick="shareOnWhatsApp('${resourceTitle}')">
							<i class="fab fa-whatsapp"></i> WhatsApp
						</button>
						<button onclick="shareOnTwitter('${resourceTitle}')">
							<i class="fab fa-twitter"></i> Twitter
						</button>
						<button onclick="shareOnFacebook('${resourceTitle}')">
							<i class="fab fa-facebook"></i> Facebook
						</button>
						<button onclick="copyLink('${resourceTitle}')">
							<i class="fas fa-link"></i> Copy Link
						</button>
					</div>
				`;
				document.body.appendChild(shareMenu);
				setTimeout(() => shareMenu.remove(), 3000);
			}
		}

		function shareOnWhatsApp(title) {
			const url = encodeURIComponent(window.location.href);
			window.open(`https://wa.me/?text=Check out ${title} on Community Access Hub! ${url}`);
		}

		function shareOnTwitter(title) {
			const url = encodeURIComponent(window.location.href);
			window.open(`https://twitter.com/intent/tweet?text=Check out ${title} on Community Access Hub!&url=${url}`);
		}

		function shareOnFacebook(title) {
			const url = encodeURIComponent(window.location.href);
			window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`);
		}

		function copyLink(title) {
			navigator.clipboard.writeText(window.location.href);
			showToast('Link copied to clipboard!');
		}

		function showToast(message) {
			const toast = document.createElement('div');
			toast.className = 'toast';
			toast.textContent = message;
			document.body.appendChild(toast);
			setTimeout(() => toast.remove(), 3000);
		}

		// Initialize resources and favorites
		renderResources(resources);
		renderFavorites();

		// Form submissions
		document.getElementById('feedbackForm').addEventListener('submit', (e) => {
			e.preventDefault();
			const feedback = document.getElementById('feedbackInput').value;
			const button = e.target.querySelector('button');
			button.innerHTML = '<i class="fas fa-check"></i> Submitted!';
			button.style.backgroundColor = '#059669';
			setTimeout(() => {
				button.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Feedback';
				button.style.backgroundColor = '';
				document.getElementById('feedbackInput').value = '';
			}, 2000);
		});

		document.getElementById('notificationForm').addEventListener('submit', (e) => {
			e.preventDefault();
			const email = document.getElementById('emailInput').value;
			const button = e.target.querySelector('button');
			button.innerHTML = '<i class="fas fa-check"></i> Subscribed!';
			button.style.backgroundColor = '#059669';
			setTimeout(() => {
				button.innerHTML = '<i class="fas fa-bell"></i> Subscribe';
				button.style.backgroundColor = '';
				document.getElementById('emailInput').value = '';
			}, 2000);
		});

		// Navbar scroll effect
		window.addEventListener('scroll', () => {
			const navbar = document.querySelector('.navbar');
			if (window.scrollY > 50) {
				navbar.classList.add('scrolled');
			} else {
				navbar.classList.remove('scrolled');
			}
		});

		// Scroll to top button
		const scrollToTop = document.querySelector('.scroll-to-top');
		window.addEventListener('scroll', () => {
			if (window.scrollY > 300) {
				scrollToTop.classList.add('visible');
			} else {
				scrollToTop.classList.remove('visible');
			}
		});

		// Theme toggle
		function toggleTheme() {
			const body = document.body;
			const currentTheme = body.getAttribute('data-theme');
			const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

			body.setAttribute('data-theme', newTheme);
			localStorage.setItem('theme', newTheme);

			const themeButton = document.querySelector('.floating-button:last-child i');
			themeButton.className = newTheme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
		}

		// Initialize theme from localStorage
		const savedTheme = localStorage.getItem('theme') || 'light';
		document.body.setAttribute('data-theme', savedTheme);
		const themeButton = document.querySelector('.floating-button:last-child i');
		themeButton.className = savedTheme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';

		// Add smooth scroll behavior
		document.querySelectorAll('a[href^="#"]').forEach(anchor => {
			anchor.addEventListener('click', function (e) {
				e.preventDefault();
				document.querySelector(this.getAttribute('href')).scrollIntoView({
					behavior: 'smooth'
				});
			});
		});

		// Add intersection observer for fade-in animations
		const observer = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					entry.target.classList.add('fade-in');
				}
			});
		}, {
			threshold: 0.1
		});

		document.querySelectorAll('.resource-card, .feedback-section, .notification-section').forEach(el => {
			observer.observe(el);
		});

		// Add keyboard navigation
		document.addEventListener('keydown', (e) => {
			if (e.key === 'Escape') {
				const favoritesSection = document.querySelector('.favorites-section');
				if (favoritesSection.classList.contains('active')) {
					toggleFavorites();
				}
			}
		});

		// Add loading state for search
		let searchTimeout;
		document.getElementById('searchInput').addEventListener('input', (e) => {
			clearTimeout(searchTimeout);
			const loading = document.querySelector('.loading');
			loading.style.display = 'block';

			searchTimeout = setTimeout(() => {
				filterResources();
				loading.style.display = 'none';
			}, 500);
		});

		// Add these functions to your existing JavaScript
		function showResourceDetails(resource) {
			currentResource = resource;
			const modal = document.getElementById('resourceDetailsModal');
			const isFavorite = favorites.includes(resource.title);

			// Update modal content
			document.getElementById('resourceDetailsTitle').textContent = resource.title;
			document.getElementById('resourceDetailsCategory').textContent = resource.category;
			document.getElementById('resourceDetailsLocation').textContent = resource.location;
			document.getElementById('resourceDetailsContact').textContent = resource.contact;
			document.getElementById('resourceDetailsDate').textContent = resource.date;
			document.getElementById('resourceDetailsDescription').innerHTML = resource.longDescription;

			// Update favorite button
			const favoriteButton = document.querySelector('.resource-details-actions .button');
			favoriteButton.classList.toggle('active', isFavorite);
			document.getElementById('favoriteButtonText').textContent = isFavorite ? 'Remove from Favorites' : 'Add to Favorites';

			// Show modal
			modal.classList.add('active');
			document.body.style.overflow = 'hidden';
		}

		function closeResourceModal() {
			const modal = document.getElementById('resourceDetailsModal');
			modal.classList.remove('active');
			document.body.style.overflow = '';
			currentResource = null;
		}

		function toggleFavoriteFromModal() {
			if (currentResource) {
				toggleFavorite(currentResource.title);
				const isFavorite = favorites.includes(currentResource.title);
				const favoriteButton = document.querySelector('.resource-details-actions .button');
				favoriteButton.classList.toggle('active', isFavorite);
				document.getElementById('favoriteButtonText').textContent = isFavorite ? 'Remove from Favorites' : 'Add to Favorites';
			}
		}

		function shareResourceFromModal() {
			if (currentResource) {
				shareResource(currentResource.title);
			}
		}

		// Add these functions for registration modal
		function showRegistrationModal(eventTitle) {
			const modal = document.getElementById('registrationModal');
			document.getElementById('registrationTitle').textContent = `Register for ${eventTitle}`;
			modal.classList.add('active');
			document.body.style.overflow = 'hidden';
		}

		function closeRegistrationModal() {
			const modal = document.getElementById('registrationModal');
			modal.classList.remove('active');
			document.body.style.overflow = '';
		}

		function submitRegistration() {
			const form = document.querySelector('.registration-form');
			const submitButton = form.querySelector('button[type="submit"]');

			// Get form data
			const formData = {
				fullName: document.getElementById('fullName').value,
				email: document.getElementById('email').value,
				phone: document.getElementById('phone').value,
				dob: document.getElementById('dob').value,
				gender: document.getElementById('gender').value,
				eventCategory: document.getElementById('eventCategory').value,
				organization: document.getElementById('organization').value,
				experience: document.getElementById('experience').value,
				message: document.getElementById('message').value,
				eventTitle: document.getElementById('registrationTitle').textContent.replace('Register for ', '')
			};

			// Here you would typically send the form data to your backend
			// For now, we'll just show a success message
			submitButton.innerHTML = '<i class="fas fa-check"></i> Registration Successful!';
			submitButton.style.backgroundColor = '#059669';

			// Log the form data to console (for demonstration)
			console.log('Registration Data:', formData);

			// Reset form after 2 seconds
			setTimeout(() => {
				form.reset();
				submitButton.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Registration';
				submitButton.style.backgroundColor = '';
				closeRegistrationModal();
			}, 2000);
		}

		// Close modal when clicking outside
		document.getElementById('registrationModal').addEventListener('click', (e) => {
			if (e.target === e.currentTarget) {
				closeRegistrationModal();
			}
		});

		// Close modal with Escape key
		document.addEventListener('keydown', (e) => {
			if (e.key === 'Escape') {
				closeRegistrationModal();
			}
		});
	</script>
</body>

</html>