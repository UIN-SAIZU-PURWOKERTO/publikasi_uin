-- ============================================================
-- Tambah kolom baru pada tabel sinta_authors
-- untuk menampung data dari Excel export SINTA (Master > Author > Import Excel)
-- Jalankan sekali di setiap database (lokal & server).
-- ============================================================

ALTER TABLE `sinta_authors`
    ADD COLUMN `nidn`                varchar(20)  DEFAULT NULL AFTER `name`,
    ADD COLUMN `gelar_depan`         varchar(100) DEFAULT NULL AFTER `nidn`,
    ADD COLUMN `gelar_belakang`      varchar(150) DEFAULT NULL AFTER `gelar_depan`,
    ADD COLUMN `pendidikan_terakhir` varchar(50)  DEFAULT NULL AFTER `gelar_belakang`,
    ADD COLUMN `jabatan_fungsional`  varchar(100) DEFAULT NULL AFTER `pendidikan_terakhir`,
    ADD COLUMN `articles_garuda`     int(11)      DEFAULT NULL AFTER `articles_wos`,
    ADD COLUMN `citations_garuda`    int(11)      DEFAULT NULL AFTER `citations_wos`,
    ADD COLUMN `cited_garuda`        int(11)      DEFAULT NULL AFTER `cited_wos`;

-- Skor SINTA v3 berupa desimal (mis. 516,33), sebelumnya int
ALTER TABLE `sinta_authors`
    MODIFY COLUMN `score_overall`             decimal(10,2) DEFAULT NULL,
    MODIFY COLUMN `score_3_years`             decimal(10,2) DEFAULT NULL,
    MODIFY COLUMN `score_affiliation`         decimal(10,2) DEFAULT NULL,
    MODIFY COLUMN `score_affiliation_3_years` decimal(10,2) DEFAULT NULL;

-- sinta_affiliations_authors disinkronkan dari sinta_authors saat Import Excel,
-- skornya disamakan menjadi desimal
ALTER TABLE `sinta_affiliations_authors`
    MODIFY COLUMN `sinta_score`         decimal(10,2) DEFAULT NULL,
    MODIFY COLUMN `sinta_score_3_years` decimal(10,2) DEFAULT NULL,
    MODIFY COLUMN `affil_score`         decimal(10,2) DEFAULT NULL,
    MODIFY COLUMN `affil_score_3_years` decimal(10,2) DEFAULT NULL;
