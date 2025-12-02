        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Back to top button
        const backToTopButton = document.getElementById('back-to-top');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.remove('opacity-100', 'visible');
                backToTopButton.classList.add('opacity-0', 'invisible');
            }
        });
        
        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Gallery items
        const galleryItems = [
            {
                img: "https://images.unsplash.com/photo-1571115177098-24ec42ed204d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80",
                title: "Elegant Wedding Cake",
                category: "wedding"
            },
            {
                img: "https://images.unsplash.com/photo-1559847844-5315695dadae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=739&q=80",
                title: "Unicorn Birthday Cake",
                category: "birthday"
            },
            {
                img: "https://images.unsplash.com/photo-1535254973040-607b474cb50d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80",
                title: "Floral Anniversary Cake",
                category: "special"
            },
            {
                img: "https://images.unsplash.com/photo-1588195538326-c5b1e9f80a1b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=750&q=80",
                title: "Chocolate Drip Cake",
                category: "birthday"
            },
            {
                img: "https://images.unsplash.com/photo-1535141192577-2a0f1dd6c356?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80",
                title: "Tiered Wedding Cake",
                category: "wedding"
            },
            {
                img: "https://images.unsplash.com/photo-1542828778-2774849eac3d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80",
                title: "Custom Celebration Cake",
                category: "custom"
            }
        ];
        
        // Populate gallery
        const galleryContainer = document.querySelector('#gallery .grid');
        
        galleryItems.forEach(item => {
            const galleryItem = document.createElement('div');
            galleryItem.className = 'cake-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300';
            galleryItem.innerHTML = `
                <div class="relative overflow-hidden h-64">
                    <img src="${item.img}" 
                         alt="${item.title}" 
                         class="w-full h-full object-cover transition duration-500 hover:scale-105">
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">${item.title}</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-medium text-gray-500 uppercase">${item.category}</span>
                        <button class="text-pink-600 hover:text-pink-700">
                            <i class="fas fa-expand"></i>
                        </button>
                    </div>
                </div>
            `;
            galleryContainer.appendChild(galleryItem);
        });
        
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    mobileMenu.classList.add('hidden');
                }
            });
        });