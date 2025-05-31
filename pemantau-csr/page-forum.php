<?php
/*
Template Name: Forum
*/

get_header(); ?>

<div class="page-header">
    <div class="container">
        <h1 class="page-title">Forum Diskusi CSR</h1>
        <p class="page-description">Platform diskusi dan berbagi pengalaman program CSR</p>
    </div>
</div>

<main class="main-content">
    <!-- Forum Stats -->
    <section class="forum-stats-section">
        <div class="container">
            <div class="forum-stats">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-info">
                        <h3>1,234</h3>
                        <p>Anggota Aktif</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="stat-info">
                        <h3>5,678</h3>
                        <p>Diskusi</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div class="stat-info">
                        <h3>890</h3>
                        <p>Ide Program</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="stat-info">
                        <h3>345</h3>
                        <p>Kolaborasi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section">
        <div class="container">
            <h2 class="section-title">Kategori Diskusi</h2>
            <div class="category-grid">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="category-info">
                        <h3>Pendidikan</h3>
                        <p>Diskusi program CSR di bidang pendidikan, beasiswa, dan pengembangan SDM</p>
                        <div class="category-stats">
                            <span>245 diskusi</span>
                            <span>1.2k anggota</span>
                        </div>
                    </div>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <div class="category-info">
                        <h3>Kesehatan</h3>
                        <p>Program kesehatan masyarakat, gizi, dan akses layanan kesehatan</p>
                        <div class="category-stats">
                            <span>189 diskusi</span>
                            <span>890 anggota</span>
                        </div>
                    </div>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <div class="category-info">
                        <h3>Lingkungan</h3>
                        <p>Konservasi alam, pengelolaan limbah, dan program ramah lingkungan</p>
                        <div class="category-stats">
                            <span>312 diskusi</span>
                            <span>1.5k anggota</span>
                        </div>
                    </div>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="category-info">
                        <h3>Ekonomi</h3>
                        <p>Pemberdayaan UMKM, kewirausahaan, dan pengembangan ekonomi lokal</p>
                        <div class="category-stats">
                            <span>156 diskusi</span>
                            <span>670 anggota</span>
                        </div>
                    </div>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <div class="category-info">
                        <h3>Sosial</h3>
                        <p>Program bantuan sosial, community development, dan pemberdayaan masyarakat</p>
                        <div class="category-stats">
                            <span>198 diskusi</span>
                            <span>980 anggota</span>
                        </div>
                    </div>
                </div>
                
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="category-info">
                        <h3>Teknologi</h3>
                        <p>Inovasi teknologi untuk CSR, digital transformation, dan tech for good</p>
                        <div class="category-stats">
                            <span>87 diskusi</span>
                            
                            <span>420 anggota</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Discussions -->
    <section class="recent-discussions-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Diskusi Terbaru</h2>
                <a href="#" class="btn btn-primary">Mulai Diskusi Baru</a>
            </div>
            
            <div class="discussions-list">
                <div class="discussion-item">
                    <div class="discussion-avatar">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/user1.jpg" alt="User" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:50px; height:50px; background:#667eea; color:white; align-items:center; justify-content:center; border-radius:50%; font-weight:bold;">AS</div>
                    </div>
                    
                    <div class="discussion-content">
                        <div class="discussion-header">
                            <h3><a href="#">Strategi Efektif Program Beasiswa CSR untuk Mahasiswa Kurang Mampu</a></h3>
                            <div class="discussion-meta">
                                <span class="author">Ahmad Santoso</span>
                                <span class="category">Pendidikan</span>
                                <span class="time">2 jam yang lalu</span>
                            </div>
                        </div>
                        
                        <p class="discussion-excerpt">Bagaimana cara merancang program beasiswa yang tepat sasaran dan berkelanjutan? Mari diskusikan best practices dari berbagai perusahaan...</p>
                        
                        <div class="discussion-stats">
                            <span><i class="fas fa-comments"></i> 12 balasan</span>
                            <span><i class="fas fa-eye"></i> 156 views</span>
                            <span><i class="fas fa-heart"></i> 8 likes</span>
                        </div>
                    </div>
                </div>
                
                <div class="discussion-item">
                    <div class="discussion-avatar">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/user2.jpg" alt="User" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:50px; height:50px; background:#e74c3c; color:white; align-items:center; justify-content:center; border-radius:50%; font-weight:bold;">SN</div>
                    </div>
                    
                    <div class="discussion-content">
                        <div class="discussion-header">
                            <h3><a href="#">Implementasi Program Zero Waste di Lingkungan Perkantoran</a></h3>
                            <div class="discussion-meta">
                                <span class="author">Sari Nurlaila</span>
                                <span class="category">Lingkungan</span>
                                <span class="time">5 jam yang lalu</span>
                            </div>
                        </div>
                        
                        <p class="discussion-excerpt">Berbagi pengalaman implementasi program zero waste di kantor. Tantangan, solusi, dan hasil yang dicapai setelah 1 tahun berjalan...</p>
                        
                        <div class="discussion-stats">
                            <span><i class="fas fa-comments"></i> 18 balasan</span>
                            <span><i class="fas fa-eye"></i> 234 views</span>
                            <span><i class="fas fa-heart"></i> 15 likes</span>
                        </div>
                    </div>
                </div>
                
                <div class="discussion-item">
                    <div class="discussion-avatar">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/user3.jpg" alt="User" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:50px; height:50px; background:#27ae60; color:white; align-items:center; justify-content:center; border-radius:50%; font-weight:bold;">BP</div>
                    </div>
                    
                    <div class="discussion-content">
                        <div class="discussion-header">
                            <h3><a href="#">Kolaborasi Lintas Perusahaan untuk Program Kesehatan Masyarakat</a></h3>
                            <div class="discussion-meta">
                                <span class="author">Budi Prasetyo</span>
                                <span class="category">Kesehatan</span>
                                <span class="time">1 hari yang lalu</span>
                            </div>
                        </div>
                        
                        <p class="discussion-excerpt">Mencari partner untuk program kesehatan masyarakat di daerah terpencil. Bagaimana membangun kolaborasi yang efektif antar perusahaan?</p>
                        
                        <div class="discussion-stats">
                            <span><i class="fas fa-comments"></i> 25 balasan</span>
                            <span><i class="fas fa-eye"></i> 412 views</span>
                            <span><i class="fas fa-heart"></i> 22 likes</span>
                        </div>
                    </div>
                </div>
                
                <div class="discussion-item">
                    <div class="discussion-avatar">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/user4.jpg" alt="User" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:50px; height:50px; background:#f39c12; color:white; align-items:center; justify-content:center; border-radius:50%; font-weight:bold;">LP</div>
                    </div>
                    
                    <div class="discussion-content">
                        <div class="discussion-header">
                            <h3><a href="#">Teknologi Blockchain untuk Transparansi Dana CSR</a></h3>
                            <div class="discussion-meta">
                                <span class="author">Lisa Permata</span>
                                <span class="category">Teknologi</span>
                                <span class="time">2 hari yang lalu</span>
                            </div>
                        </div>
                        
                        <p class="discussion-excerpt">Bagaimana teknologi blockchain dapat meningkatkan transparansi dan akuntabilitas dalam penyaluran dana CSR? Mari diskusikan implementasinya...</p>
                        
                        <div class="discussion-stats">
                            <span><i class="fas fa-comments"></i> 9 balasan</span>
                            <span><i class="fas fa-eye"></i> 187 views</span>
                            <span><i class="fas fa-heart"></i> 11 likes</span>
                        </div>
                    </div>
                </div>
                
                <div class="discussion-item">
                    <div class="discussion-avatar">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/user5.jpg" alt="User" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:50px; height:50px; background:#9b59b6; color:white; align-items:center; justify-content:center; border-radius:50%; font-weight:bold;">RH</div>
                    </div>
                    
                    <div class="discussion-content">
                        <div class="discussion-header">
                            <h3><a href="#">Pemberdayaan UMKM Melalui Program Digital Marketing</a></h3>
                            <div class="discussion-meta">
                                <span class="author">Rina Hartati</span>
                                <span class="category">Ekonomi</span>
                                <span class="time">3 hari yang lalu</span>
                            </div>
                        </div>
                        
                        <p class="discussion-excerpt">Sharing program pelatihan digital marketing untuk UMKM. Tools yang digunakan, metode pelatihan, dan hasil yang dicapai para peserta...</p>
                        
                        <div class="discussion-stats">
                            <span><i class="fas fa-comments"></i> 31 balasan</span>
                            <span><i class="fas fa-eye"></i> 523 views</span>
                            <span><i class="fas fa-heart"></i> 28 likes</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="load-more-section">
                <button class="btn btn-outline load-more-btn">Muat Lebih Banyak</button>
            </div>
        </div>
    </section>

    <!-- Trending Topics -->
    <section class="trending-topics-section">
        <div class="container">
            <h2 class="section-title">Topik Trending</h2>
            <div class="trending-tags">
                <span class="trending-tag">#DigitalTransformation</span>
                <span class="trending-tag">#SustainableDevelopment</span>
                <span class="trending-tag">#CommunityEmpowerment</span>
                <span class="trending-tag">#GreenTechnology</span>
                <span class="trending-tag">#SocialImpact</span>
                <span class="trending-tag">#InclusiveGrowth</span>
                <span class="trending-tag">#ClimateAction</span>
                <span class="trending-tag">#YouthDevelopment</span>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
