<?php
/*
Template Name: Organisasi
*/

get_header(); ?>

<div class="page-header">
    <div class="container">
        <h1 class="page-title">Struktur Organisasi</h1>
        <p class="page-description">Mengenal lebih dekat struktur organisasi dan tim CSR kami</p>
    </div>
</div>

<main class="main-content">
    <!-- Visi Misi Section -->
    <section class="visi-misi-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="visi-box">
                        <h2>Visi</h2>
                        <p>Menjadi organisasi CSR terdepan yang menciptakan dampak positif berkelanjutan bagi masyarakat dan lingkungan melalui kolaborasi strategis dengan perusahaan-perusahaan terkemuka.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="misi-box">
                        <h2>Misi</h2>
                        <ul>
                            <li>Memfasilitasi program CSR yang berdampak nyata bagi masyarakat</li>
                            <li>Mengembangkan kemitraan strategis dengan berbagai stakeholder</li>
                            <li>Meningkatkan kesadaran perusahaan tentang tanggung jawab sosial</li>
                            <li>Mendorong inovasi dalam program-program keberlanjutan</li>
                            <li>Membangun ekosistem CSR yang kolaboratif dan transparan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi -->
    <section class="struktur-organisasi">
        <div class="container">
            <h2 class="section-title">Struktur Organisasi</h2>
            
            <!-- Level 1: Ketua Umum -->
            <div class="org-level">
                <div class="org-card ketua-umum">
                    <div class="org-photo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ketua-umum.jpg" alt="Ketua Umum" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:100%; height:100%; background:#667eea; color:white; align-items:center; justify-content:center; font-size:2rem;">KU</div>
                    </div>
                    <h3>Dr. Ahmad Wijaya</h3>
                    <p class="position">Ketua Umum</p>
                    <p class="description">Memimpin visi strategis organisasi CSR</p>
                </div>
            </div>

            <!-- Level 2: Wakil Ketua -->
            <div class="org-level">
                <div class="org-card">
                    <div class="org-photo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/wakil-ketua-1.jpg" alt="Wakil Ketua 1" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:100%; height:100%; background:#764ba2; color:white; align-items:center; justify-content:center; font-size:2rem;">WK1</div>
                    </div>
                    <h3>Siti Nurhaliza, M.M.</h3>
                    <p class="position">Wakil Ketua I</p>
                    <p class="description">Mengawasi program dan kemitraan strategis</p>
                </div>
                
                <div class="org-card">
                    <div class="org-photo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/wakil-ketua-2.jpg" alt="Wakil Ketua 2" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:100%; height:100%; background:#764ba2; color:white; align-items:center; justify-content:center; font-size:2rem;">WK2</div>
                    </div>
                    <h3>Budi Santoso, S.E.</h3>
                    <p class="position">Wakil Ketua II</p>
                    <p class="description">Mengelola operasional dan administrasi</p>
                </div>
            </div>

            <!-- Level 3: Direktur -->
            <div class="org-level">
                <div class="org-card">
                    <div class="org-photo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/dir-program.jpg" alt="Direktur Program" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:100%; height:100%; background:#27ae60; color:white; align-items:center; justify-content:center; font-size:2rem;">DP</div>
                    </div>
                    <h3>Maya Sari, M.Si.</h3>
                    <p class="position">Direktur Program</p>
                    <p class="description">Mengembangkan dan mengawasi program CSR</p>
                </div>
                
                <div class="org-card">
                    <div class="org-photo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/dir-kemitraan.jpg" alt="Direktur Kemitraan" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:100%; height:100%; background:#e74c3c; color:white; align-items:center; justify-content:center; font-size:2rem;">DK</div>
                    </div>
                    <h3>Rudi Hartono, M.B.A.</h3>
                    <p class="position">Direktur Kemitraan</p>
                    <p class="description">Membangun dan memelihara kemitraan strategis</p>
                </div>
                
                <div class="org-card">
                    <div class="org-photo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/dir-komunikasi.jpg" alt="Direktur Komunikasi" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:100%; height:100%; background:#f39c12; color:white; align-items:center; justify-content:center; font-size:2rem;">DKom</div>
                    </div>
                    <h3>Lisa Permata, S.Kom.</h3>
                    <p class="position">Direktur Komunikasi</p>
                    <p class="description">Mengelola komunikasi dan publikasi</p>
                </div>
            </div>

            <!-- Level 4: Manager -->
            <div class="org-level">
                <div class="org-card">
                    <div class="org-photo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/mgr-pendidikan.jpg" alt="Manager Pendidikan" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:100%; height:100%; background:#9b59b6; color:white; align-items:center; justify-content:center; font-size:1.5rem;">MP</div>
                    </div>
                    <h3>Andi Pratama, S.Pd.</h3>
                    <p class="position">Manager Pendidikan</p>
                    <p class="description">Program pendidikan dan beasiswa</p>
                </div>
                
                <div class="org-card">
                    <div class="org-photo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/mgr-kesehatan.jpg" alt="Manager Kesehatan" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:100%; height:100%; background:#e67e22; color:white; align-items:center; justify-content:center; font-size:1.5rem;">MK</div>
                    </div>
                    <h3>Dr. Fitri Handayani</h3>
                    <p class="position">Manager Kesehatan</p>
                    <p class="description">Program kesehatan masyarakat</p>
                </div>
                
                <div class="org-card">
                    <div class="org-photo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/mgr-lingkungan.jpg" alt="Manager Lingkungan" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:100%; height:100%; background:#16a085; color:white; align-items:center; justify-content:center; font-size:1.5rem;">ML</div>
                    </div>
                    <h3>Eco Wijayanto, S.T.</h3>
                    <p class="position">Manager Lingkungan</p>
                    <p class="description">Program pelestarian lingkungan</p>
                </div>
                
                <div class="org-card">
                    <div class="org-photo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/mgr-ekonomi.jpg" alt="Manager Ekonomi" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:100%; height:100%; background:#34495e; color:white; align-items:center; justify-content:center; font-size:1.5rem;">ME</div>
                    </div>
                    <h3>Sari Ekonomi, S.E.</h3>
                    <p class="position">Manager Ekonomi</p>
                    <p class="description">Program pemberdayaan ekonomi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Dewan Pengawas -->
    <section class="dewan-pengawas">
        <div class="container">
            <h2 class="section-title">Dewan Pengawas</h2>
            <div class="org-level">
                <div class="org-card">
                    <div class="org-photo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/pengawas-1.jpg" alt="Ketua Dewan Pengawas" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:100%; height:100%; background:#2c3e50; color:white; align-items:center; justify-content:center; font-size:1.5rem;">KDP</div>
                    </div>
                    <h3>Prof. Dr. Soedirman</h3>
                    <p class="position">Ketua Dewan Pengawas</p>
                    <p class="description">Mengawasi tata kelola organisasi</p>
                </div>
                
                <div class="org-card">
                    <div class="org-photo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/pengawas-2.jpg" alt="Anggota Dewan Pengawas" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none; width:100%; height:100%; background:#8e44ad; color:white; align-items:center; justify-content:center; font-size:1.5rem;">ADP</div>
                    </div>
                    <h3>Ir. Bambang Sutrisno</h3>
                    <p class="position">Anggota Dewan Pengawas</p>
                    <p class="description">Pengawasan program dan keuangan</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
