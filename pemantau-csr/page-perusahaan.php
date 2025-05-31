<?php
/*
Template Name: Perusahaan
*/

get_header(); ?>

<div class="page-header">
    <div class="container">
        <h1 class="page-title">Perusahaan Partner</h1>
        <p class="page-description">Perusahaan-perusahaan yang berkomitmen dalam program CSR bersama kami</p>
    </div>
</div>

<main class="main-content">
    <!-- Filter Section -->
    <section class="filter-section">
        <div class="container">
            <div class="filter-controls">
                <button class="filter-btn active" data-filter="all">Semua Perusahaan</button>
                <button class="filter-btn" data-filter="bumn">BUMN</button>
                <button class="filter-btn" data-filter="swasta">Swasta</button>
                <button class="filter-btn" data-filter="multinasional">Multinasional</button>
                <button class="filter-btn" data-filter="startup">Startup</button>
            </div>
            
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Cari perusahaan..." id="companySearch">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>
    </section>

    <!-- Companies Grid -->
    <section class="companies-section">
        <div class="container">
            <div class="companies-grid">
                <!-- Company 1 -->
                <div class="company-card" data-category="bumn" data-searchable="pt pertamina energi oil gas">
                    <div class="company-header">
                        <div class="company-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/pertamina-logo.png" alt="Pertamina" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display:none; width:80px; height:80px; background:#e74c3c; color:white; align-items:center; justify-content:center; border-radius:50%; font-weight:bold;">PTM</div>
                        </div>
                        <div class="company-badge bumn">BUMN</div>
                    </div>
                    
                    <div class="company-info">
                        <h3>PT Pertamina (Persero)</h3>
                        <p class="company-sector">Energi & Migas</p>
                        <p class="company-description">Perusahaan energi nasional yang berkomitmen pada program CSR berkelanjutan di bidang pendidikan, kesehatan, dan lingkungan.</p>
                        
                        <div class="company-stats">
                            <div class="stat-item">
                                <span class="stat-number">15</span>
                                <span class="stat-label">Program CSR</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">50K+</span>
                                <span class="stat-label">Penerima Manfaat</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">5</span>
                                <span class="stat-label">Tahun Kemitraan</span>
                            </div>
                        </div>
                        
                        <div class="company-programs">
                            <h4>Program Unggulan:</h4>
                            <ul>
                                <li>Beasiswa Pertamina Sobat Bumi</li>
                                <li>Program Kesehatan Masyarakat</li>
                                <li>Konservasi Lingkungan</li>
                            </ul>
                        </div>
                        
                        <div class="company-contact">
                            <a href="#" class="btn btn-primary">Lihat Detail</a>
                            <a href="#" class="btn btn-outline">Hubungi</a>
                        </div>
                    </div>
                </div>

                <!-- Company 2 -->
                <div class="company-card" data-category="swasta" data-searchable="pt astra international automotive">
                    <div class="company-header">
                        <div class="company-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/astra-logo.png" alt="Astra" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display:none; width:80px; height:80px; background:#2980b9; color:white; align-items:center; justify-content:center; border-radius:50%; font-weight:bold;">AST</div>
                        </div>
                        <div class="company-badge swasta">Swasta</div>
                    </div>
                    
                    <div class="company-info">
                        <h3>PT Astra International Tbk</h3>
                        <p class="company-sector">Otomotif & Finansial</p>
                        <p class="company-description">Grup perusahaan terdiversifikasi dengan komitmen kuat pada pembangunan berkelanjutan dan pemberdayaan masyarakat.</p>
                        
                        <div class="company-stats">
                            <div class="stat-item">
                                <span class="stat-number">25</span>
                                <span class="stat-label">Program CSR</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">100K+</span>
                                <span class="stat-label">Penerima Manfaat</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">8</span>
                                <span class="stat-label">Tahun Kemitraan</span>
                            </div>
                        </div>
                        
                        <div class="company-programs">
                            <h4>Program Unggulan:</h4>
                            <ul>
                                <li>Astra Untuk Indonesia</li>
                                <li>Program Pendidikan Vokasi</li>
                                <li>UMKM Development</li>
                            </ul>
                        </div>
                        
                        <div class="company-contact">
                            <a href="#" class="btn btn-primary">Lihat Detail</a>
                            <a href="#" class="btn btn-outline">Hubungi</a>
                        </div>
                    </div>
                </div>

                <!-- Company 3 -->
                <div class="company-card" data-category="multinasional" data-searchable="unilever consumer goods fmcg">
                    <div class="company-header">
                        <div class="company-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/unilever-logo.png" alt="Unilever" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display:none; width:80px; height:80px; background:#27ae60; color:white; align-items:center; justify-content:center; border-radius:50%; font-weight:bold;">UNI</div>
                        </div>
                        <div class="company-badge multinasional">Multinasional</div>
                    </div>
                    
                    <div class="company-info">
                        <h3>PT Unilever Indonesia Tbk</h3>
                        <p class="company-sector">Consumer Goods</p>
                        <p class="company-description">Perusahaan multinasional yang fokus pada sustainable living dan pemberdayaan perempuan melalui program CSR inovatif.</p>
                        
                        <div class="company-stats">
                            <div class="stat-item">
                                <span class="stat-number">12</span>
                                <span class="stat-label">Program CSR</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">75K+</span>
                                <span class="stat-label">Penerima Manfaat</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">6</span>
                                <span class="stat-label">Tahun Kemitraan</span>
                            </div>
                        </div>
                        
                        <div class="company-programs">
                            <h4>Program Unggulan:</h4>
                            <ul>
                                <li>Sustainable Living Plan</li>
                                <li>Women Empowerment</li>
                                <li>Clean Water Access</li>
                            </ul>
                        </div>
                        
                        <div class="company-contact">
                            <a href="#" class="btn btn-primary">Lihat Detail</a>
                            <a href="#" class="btn btn-outline">Hubungi</a>
                        </div>
                    </div>
                </div>

                <!-- Company 4 -->
                <div class="company-card" data-category="startup" data-searchable="gojek teknologi digital transportation">
                    <div class="company-header">
                        <div class="company-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/gojek-logo.png" alt="Gojek" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display:none; width:80px; height:80px; background:#00aa13; color:white; align-items:center; justify-content:center; border-radius:50%; font-weight:bold;">GO</div>
                        </div>
                        <div class="company-badge startup">Startup</div>
                    </div>
                    
                    <div class="company-info">
                        <h3>PT Gojek Indonesia</h3>
                        <p class="company-sector">Teknologi & Transportasi</p>
                        <p class="company-description">Platform teknologi yang menggunakan inovasi digital untuk memberdayakan masyarakat dan mendorong inklusi ekonomi.</p>
                        
                        <div class="company-stats">
                            <div class="stat-item">
                                <span class="stat-number">8</span>
                                <span class="stat-label">Program CSR</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">30K+</span>
                                <span class="stat-label">Penerima Manfaat</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">3</span>
                                <span class="stat-label">Tahun Kemitraan</span>
                            </div>
                        </div>
                        
                        <div class="company-programs">
                            <h4>Program Unggulan:</h4>
                            <ul>
                                <li>GoTo Impact Foundation</li>
                                <li>Digital Literacy Program</li>
                                <li>MSME Digitalization</li>
                            </ul>
                        </div>
                        
                        <div class="company-contact">
                            <a href="#" class="btn btn-primary">Lihat Detail</a>
                            <a href="#" class="btn btn-outline">Hubungi</a>
                        </div>
                    </div>
                </div>

                <!-- Company 5 -->
                <div class="company-card" data-category="bumn" data-searchable="bank mandiri financial banking">
                    <div class="company-header">
                        <div class="company-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/mandiri-logo.png" alt="Bank Mandiri" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display:none; width:80px; height:80px; background:#003d7a; color:white; align-items:center; justify-content:center; border-radius:50%; font-weight:bold;">BM</div>
                        </div>
                        <div class="company-badge bumn">BUMN</div>
                    </div>
                    
                    <div class="company-info">
                        <h3>PT Bank Mandiri (Persero) Tbk</h3>
                        <p class="company-sector">Perbankan & Keuangan</p>
                        <p class="company-description">Bank terbesar di Indonesia yang berkomitmen pada pembangunan ekonomi berkelanjutan melalui program CSR yang impactful.</p>
                        
                        <div class="company-stats">
                            <div class="stat-item">
                                <span class="stat-number">20</span>
                                <span class="stat-label">Program CSR</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">80K+</span>
                                <span class="stat-label">Penerima Manfaat</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">7</span>
                                <span class="stat-label">Tahun Kemitraan</span>
                            </div>
                        </div>
                        
                        <div class="company-programs">
                            <h4>Program Unggulan:</h4>
                            <ul>
                                <li>Mandiri Wirausaha</li>
                                <li>Financial Inclusion</li>
                                <li>Disaster Relief Program</li>
                            </ul>
                        </div>
                        
                        <div class="company-contact">
                            <a href="#" class="btn btn-primary">Lihat Detail</a>
                            <a href="#" class="btn btn-outline">Hubungi</a>
                        </div>
                    </div>
                </div>

                <!-- Company 6 -->
                <div class="company-card" data-category="swasta" data-searchable="indofood food beverage consumer">
                    <div class="company-header">
                        <div class="company-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/indofood-logo.png" alt="Indofood" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display:none; width:80px; height:80px; background:#d35400; color:white; align-items:center; justify-content:center; border-radius:50%; font-weight:bold;">IF</div>
                        </div>
                        <div class="company-badge swasta">Swasta</div>
                    </div>
                    
                    <div class="company-info">
                        <h3>PT Indofood Sukses Makmur Tbk</h3>
                        <p class="company-sector">Food & Beverage</p>
                        <p class="company-description">Perusahaan makanan terbesar di Indonesia yang peduli pada ketahanan pangan dan pemberdayaan petani lokal.</p>
                        
                        <div class="company-stats">
                            <div class="stat-item">
                                <span class="stat-number">18</span>
                                <span class="stat-label">Program CSR</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">60K+</span>
                                <span class="stat-label">Penerima Manfaat</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">6</span>
                                <span class="stat-label">Tahun Kemitraan</span>
                            </div>
                        </div>
                        
                        <div class="company-programs">
                            <h4>Program Unggulan:</h4>
                            <ul>
                                <li>Food Security Program</li>
                                <li>Farmer Empowerment</li>
                                <li>Nutrition Education</li>
                            </ul>
                        </div>
                        
                        <div class="company-contact">
                            <a href="#" class="btn btn-primary">Lihat Detail</a>
                            <a href="#" class="btn btn-outline">Hubungi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const companyCards = document.querySelectorAll('.company-card');
    const searchInput = document.getElementById('companySearch');
    
    // Filter by category
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filter cards
            companyCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
    
    // Search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        companyCards.forEach(card => {
            const searchableText = card.getAttribute('data-searchable').toLowerCase();
            const companyName = card.querySelector('h3').textContent.toLowerCase();
            
            if (searchableText.includes(searchTerm) || companyName.includes(searchTerm) || searchTerm === '') {
                card.style.display = 'block';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            } else {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.display = 'none';
                }, 300);
            }
        });
    });
});
</script>

<?php get_footer(); ?>
