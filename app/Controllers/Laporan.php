<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Datakejadian;
use App\Models\Datamobilpetugas;
use App\Models\Datamobilkorban;
use App\Models\DataKorban;
use App\Models\DataBbm;
use App\Models\Datadetaillaporan;

class Laporan extends BaseController
{
    public function kejadian()
    {
        return view('laporan/kejadian');
    }

    public function mobilPetugas()
    {
        return view('laporan/mobilpetugas');
    }

    public function mobilTerlibat()
    {
        return view('laporan/mobilterlibat');
    }

    public function korbanKecelakaan()
    {
        return view('laporan/korbankecelakaan');
    }

    public function bbmMobil()
    {
        return view('laporan/bbmmobil');
    }

    public function laporanTerkait()
    {
        return view('laporan/laporanterkait');
    }

    public function laporanKejadian()
    {
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');
        $laporan = new Datakejadian();
        $dataLaporan = $laporan->dataExcel($tglawal, $tglakhir);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $styleColumn = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];

        $borderArray = [
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ]
        ];

        $sheet->setCellValue('A1', 'DATA KEJADIAN BULANAN SENKOM');
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('A1')->applyFromArray($styleColumn);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'NO Kejadian');
        $sheet->setCellValue('C3', 'No Laporan');
        $sheet->setCellValue('D3', 'Kategori Laporan');
        $sheet->setCellValue('E3', 'Nama Pelapor');
        $sheet->setCellValue('F3', 'Kontak Pelapor');
        $sheet->setCellValue('G3', 'No Telepon Pelapor');
        $sheet->setCellValue('H3', 'Sumber Informasi');
        $sheet->setCellValue('I3', 'Status Kejadian');
        $sheet->setCellValue('J3', 'Tipe Kejadian');
        $sheet->setCellValue('K3', 'Waktu Kejadian');
        $sheet->setCellValue('L3', 'Waktu Penanganan');
        $sheet->setCellValue('M3', 'Waktu Selesai');
        $sheet->setCellValue('N3', 'Cuaca Kejadian');
        $sheet->setCellValue('O3', 'Hari Kejadian');
        $sheet->setCellValue('P3', 'Kode Lokasi');
        $sheet->setCellValue('Q3', 'Deskripsi Lokasi');
        $sheet->setCellValue('R3', 'Ruas');
        $sheet->setCellValue('S3', 'Wilayah');
        $sheet->setCellValue('T3', 'Km');
        $sheet->setCellValue('U3', 'Sta');
        $sheet->setCellValue('V3', 'Jalur');
        $sheet->setCellValue('W3', 'Kondisi Jalan');
        $sheet->setCellValue('X3', 'Alinyemen');
        $sheet->setCellValue('Y3', 'Lajur Kejadian');
        $sheet->setCellValue('Z3', 'Kondisi Jalan');
        $sheet->setCellValue('AA3', 'Posisi Mobil');
        $sheet->setCellValue('AB3', 'Lokasi Kecelakaan');
        $sheet->setCellValue('AC3', 'Penyebab Kecelakaan');
        $sheet->setCellValue('AD3', 'Tipe Kecelakaan');
        $sheet->setCellValue('AE3', 'Kode Gangguan');
        $sheet->setCellValue('AF3', 'Keterangan');
        $sheet->setCellValue('AG3', 'Korban Luka Ringan');
        $sheet->setCellValue('AH3', 'Korban Luka Berat');
        $sheet->setCellValue('AI3', 'Korban Meninggal');
        $sheet->setCellValue('AJ3', 'Kendaraan Tidak Rusak');
        $sheet->setCellValue('AK3', 'Kendaraan Rusak Ringan');
        $sheet->setCellValue('AL3', 'Kendaraan Rusak Berat');
        $sheet->setCellValue('AM3', 'Tindakan');
        $sheet->setCellValue('AN3', 'Waktu Tindakan');
        $sheet->setCellValue('AO3', 'DIbuat Oleh');
        $sheet->setCellValue('AP3', 'Pada Shift');

        $sheet->getStyle('A3')->applyFromArray($styleColumn);
        $sheet->getStyle('B3')->applyFromArray($styleColumn);
        $sheet->getStyle('C3')->applyFromArray($styleColumn);
        $sheet->getStyle('D3')->applyFromArray($styleColumn);
        $sheet->getStyle('E3')->applyFromArray($styleColumn);
        $sheet->getStyle('F3')->applyFromArray($styleColumn);
        $sheet->getStyle('G3')->applyFromArray($styleColumn);
        $sheet->getStyle('H3')->applyFromArray($styleColumn);
        $sheet->getStyle('I3')->applyFromArray($styleColumn);
        $sheet->getStyle('J3')->applyFromArray($styleColumn);
        $sheet->getStyle('K3')->applyFromArray($styleColumn);
        $sheet->getStyle('L3')->applyFromArray($styleColumn);
        $sheet->getStyle('M3')->applyFromArray($styleColumn);
        $sheet->getStyle('N3')->applyFromArray($styleColumn);
        $sheet->getStyle('O3')->applyFromArray($styleColumn);
        $sheet->getStyle('P3')->applyFromArray($styleColumn);
        $sheet->getStyle('Q3')->applyFromArray($styleColumn);
        $sheet->getStyle('R3')->applyFromArray($styleColumn);
        $sheet->getStyle('S3')->applyFromArray($styleColumn);
        $sheet->getStyle('T3')->applyFromArray($styleColumn);
        $sheet->getStyle('U3')->applyFromArray($styleColumn);
        $sheet->getStyle('V3')->applyFromArray($styleColumn);
        $sheet->getStyle('W3')->applyFromArray($styleColumn);
        $sheet->getStyle('X3')->applyFromArray($styleColumn);
        $sheet->getStyle('Y3')->applyFromArray($styleColumn);
        $sheet->getStyle('Z3')->applyFromArray($styleColumn);
        $sheet->getStyle('AA3')->applyFromArray($styleColumn);
        $sheet->getStyle('AB3')->applyFromArray($styleColumn);
        $sheet->getStyle('AC3')->applyFromArray($styleColumn);
        $sheet->getStyle('AD3')->applyFromArray($styleColumn);
        $sheet->getStyle('AE3')->applyFromArray($styleColumn);
        $sheet->getStyle('AF3')->applyFromArray($styleColumn);
        $sheet->getStyle('AG3')->applyFromArray($styleColumn);
        $sheet->getStyle('AH3')->applyFromArray($styleColumn);
        $sheet->getStyle('AI3')->applyFromArray($styleColumn);
        $sheet->getStyle('AJ3')->applyFromArray($styleColumn);
        $sheet->getStyle('AK3')->applyFromArray($styleColumn);
        $sheet->getStyle('AL3')->applyFromArray($styleColumn);
        $sheet->getStyle('AM3')->applyFromArray($styleColumn);
        $sheet->getStyle('AN3')->applyFromArray($styleColumn);
        $sheet->getStyle('AO3')->applyFromArray($styleColumn);
        $sheet->getStyle('AP3')->applyFromArray($styleColumn);

        $sheet->getStyle('A3')->applyFromArray($borderArray);
        $sheet->getStyle('B3')->applyFromArray($borderArray);
        $sheet->getStyle('C3')->applyFromArray($borderArray);
        $sheet->getStyle('D3')->applyFromArray($borderArray);
        $sheet->getStyle('E3')->applyFromArray($borderArray);
        $sheet->getStyle('F3')->applyFromArray($borderArray);
        $sheet->getStyle('G3')->applyFromArray($borderArray);
        $sheet->getStyle('H3')->applyFromArray($borderArray);
        $sheet->getStyle('I3')->applyFromArray($borderArray);
        $sheet->getStyle('J3')->applyFromArray($borderArray);
        $sheet->getStyle('K3')->applyFromArray($borderArray);
        $sheet->getStyle('L3')->applyFromArray($borderArray);
        $sheet->getStyle('M3')->applyFromArray($borderArray);
        $sheet->getStyle('N3')->applyFromArray($borderArray);
        $sheet->getStyle('O3')->applyFromArray($borderArray);
        $sheet->getStyle('P3')->applyFromArray($borderArray);
        $sheet->getStyle('Q3')->applyFromArray($borderArray);
        $sheet->getStyle('R3')->applyFromArray($borderArray);
        $sheet->getStyle('S3')->applyFromArray($borderArray);
        $sheet->getStyle('T3')->applyFromArray($borderArray);
        $sheet->getStyle('U3')->applyFromArray($borderArray);
        $sheet->getStyle('V3')->applyFromArray($borderArray);
        $sheet->getStyle('W3')->applyFromArray($borderArray);
        $sheet->getStyle('X3')->applyFromArray($borderArray);
        $sheet->getStyle('Y3')->applyFromArray($borderArray);
        $sheet->getStyle('Z3')->applyFromArray($borderArray);
        $sheet->getStyle('AA3')->applyFromArray($borderArray);
        $sheet->getStyle('AB3')->applyFromArray($borderArray);
        $sheet->getStyle('AC3')->applyFromArray($borderArray);
        $sheet->getStyle('AD3')->applyFromArray($borderArray);
        $sheet->getStyle('AE3')->applyFromArray($borderArray);
        $sheet->getStyle('AF3')->applyFromArray($borderArray);
        $sheet->getStyle('AG3')->applyFromArray($borderArray);
        $sheet->getStyle('AH3')->applyFromArray($borderArray);
        $sheet->getStyle('AI3')->applyFromArray($borderArray);
        $sheet->getStyle('AJ3')->applyFromArray($borderArray);
        $sheet->getStyle('AK3')->applyFromArray($borderArray);
        $sheet->getStyle('AL3')->applyFromArray($borderArray);
        $sheet->getStyle('AM3')->applyFromArray($borderArray);
        $sheet->getStyle('AN3')->applyFromArray($borderArray);
        $sheet->getStyle('AO3')->applyFromArray($borderArray);
        $sheet->getStyle('AP3')->applyFromArray($borderArray);

        $no = 1;
        $numRow = 4;

        foreach ($dataLaporan->getResultArray() as $row) :
            $sheet->setCellValue('A' . $numRow, $no);
            $sheet->setCellValue('B' . $numRow, $row['id_kejadian']);
            $sheet->setCellValue('C' . $numRow, $row['no_laporan']);
            $sheet->setCellValue('D' . $numRow, $row['kategori_laporan']);
            $sheet->setCellValue('E' . $numRow, $row['nama_pelapor']);
            $sheet->setCellValue('F' . $numRow, $row['kontak_pelapor']);
            $sheet->setCellValue('G' . $numRow, $row['notlp_pelapor']);
            $sheet->setCellValue('H' . $numRow, $row['deskripsi_informasi']);
            $sheet->setCellValue('I' . $numRow, $row['deskripsi_status']);
            $sheet->setCellValue('J' . $numRow, $row['tipe_kejadian']);
            $sheet->setCellValue('K' . $numRow, date('d-m-Y H:i', strtotime($row['waktu_kejadian'])));
            $sheet->setCellValue('L' . $numRow, date('d-m-Y H:i', strtotime($row['waktu_penanganan'])));
            $sheet->setCellValue('M' . $numRow, date('d-m-Y H:i', strtotime($row['waktu_selesai_penanganan'])));
            $sheet->setCellValue('N' . $numRow, $row['cuaca_kejadian']);
            $sheet->setCellValue('O' . $numRow, $row['harilibur_kejadian']);
            $sheet->setCellValue('P' . $numRow, $row['kode_lokasi']);
            $sheet->setCellValue('Q' . $numRow, $row['deskripsi_lokasi']);
            $sheet->setCellValue('R' . $numRow, $row['ruas']);
            $sheet->setCellValue('S' . $numRow, $row['wilayah']);
            $sheet->setCellValue('T' . $numRow, $row['km']);
            $sheet->setCellValue('U' . $numRow, $row['sta']);
            $sheet->setCellValue('V' . $numRow, $row['jalur']);
            $sheet->setCellValue('W' . $numRow, $row['kondisi_jalanan']);
            $sheet->setCellValue('X' . $numRow, $row['alinyemen']);
            $sheet->setCellValue('Y' . $numRow, $row['lajur_kejadian']);
            $sheet->setCellValue('Z' . $numRow, $row['kondisi_jalan']);
            $sheet->setCellValue('AA' . $numRow, $row['posisi_mobil']);
            $sheet->setCellValue('AB' . $numRow, $row['lokasi_kejadian']);
            $sheet->setCellValue('AC' . $numRow, $row['deskripsi_penyebab']);
            $sheet->setCellValue('AD' . $numRow, $row['deskripsi_tipe']);
            $sheet->setCellValue('AE' . $numRow, $row['deskripsi_gangguan']);
            $sheet->setCellValue('AF' . $numRow, $row['keterangan']);
            $sheet->setCellValue('AG' . $numRow, $row['klr_kejadian']);
            $sheet->setCellValue('AH' . $numRow, $row['klb_kejadian']);
            $sheet->setCellValue('AI' . $numRow, $row['km_kejadian']);
            $sheet->setCellValue('AJ' . $numRow, $row['ktr_kejadian']);
            $sheet->setCellValue('AK' . $numRow, $row['krr_kejadian']);
            $sheet->setCellValue('AL' . $numRow, $row['krb_kejadian']);
            $sheet->setCellValue('AM' . $numRow, $row['tindakan']);
            $sheet->setCellValue('AN' . $numRow, $row['waktu_tindakan']);
            $sheet->setCellValue('AN' . $numRow, date('d-m-Y H:i', strtotime($row['waktu_tindakan'])));
            $sheet->setCellValue('AO' . $numRow, $row['name']);
            $sheet->setCellValue('AP' . $numRow, $row['shift']);

            $sheet->getStyle('A' . $numRow)->applyFromArray($styleColumn);

            $sheet->getStyle('A' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('B' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('C' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('D' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('E' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('F' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('G' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('H' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('I' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('J' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('K' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('L' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('M' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('N' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('O' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('P' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('Q' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('R' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('S' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('T' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('U' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('V' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('W' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('X' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('Y' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('Z' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AA' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AB' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AC' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AD' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AE' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AF' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AG' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AH' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AI' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AJ' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AK' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AL' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AM' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AN' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AO' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('AP' . $numRow)->applyFromArray($borderArray);

            $no++;
            $numRow++;
        endforeach;

        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setTitle('Data Kejadian');


        $fileName = date('Y-m-d-H:i') . '-Data-Kejadian';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');
        header('pragma: no-cache');
        header('Expires: 0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function laporanMobilPetugas()
    {
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');

        $laporan = new Datamobilpetugas();
        $dataLaporan = $laporan->dataExcel($tglawal, $tglakhir);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $styleColumn = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];

        $borderArray = [
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ]
        ];

        $sheet->setCellValue('A1', 'DATA MOBIL PETUGAS BULANAN SENKOM');
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('A1')->applyFromArray($styleColumn);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'NO Kejadian');
        $sheet->setCellValue('C3', 'Nama Mobil');
        $sheet->setCellValue('D3', 'Petugas 1');
        $sheet->setCellValue('E3', 'Petugas 2');
        $sheet->setCellValue('F3', 'Petugas 3');
        $sheet->setCellValue('G3', 'Petugas 4');
        $sheet->setCellValue('H3', 'Odo Awal');
        $sheet->setCellValue('I3', 'Odo AKhir');
        $sheet->setCellValue('J3', 'waktu_tiba');

        $sheet->getStyle('A3')->applyFromArray($styleColumn);
        $sheet->getStyle('B3')->applyFromArray($styleColumn);
        $sheet->getStyle('C3')->applyFromArray($styleColumn);
        $sheet->getStyle('D3')->applyFromArray($styleColumn);
        $sheet->getStyle('E3')->applyFromArray($styleColumn);
        $sheet->getStyle('F3')->applyFromArray($styleColumn);
        $sheet->getStyle('G3')->applyFromArray($styleColumn);
        $sheet->getStyle('H3')->applyFromArray($styleColumn);
        $sheet->getStyle('I3')->applyFromArray($styleColumn);
        $sheet->getStyle('J3')->applyFromArray($styleColumn);

        $sheet->getStyle('A3')->applyFromArray($borderArray);
        $sheet->getStyle('B3')->applyFromArray($borderArray);
        $sheet->getStyle('C3')->applyFromArray($borderArray);
        $sheet->getStyle('D3')->applyFromArray($borderArray);
        $sheet->getStyle('E3')->applyFromArray($borderArray);
        $sheet->getStyle('F3')->applyFromArray($borderArray);
        $sheet->getStyle('G3')->applyFromArray($borderArray);
        $sheet->getStyle('H3')->applyFromArray($borderArray);
        $sheet->getStyle('I3')->applyFromArray($borderArray);
        $sheet->getStyle('J3')->applyFromArray($borderArray);

        $no = 1;
        $numRow = 4;

        foreach ($dataLaporan->getResultArray() as $row) :

            $sheet->setCellValue('A' . $numRow, $no);
            $sheet->setCellValue('B' . $numRow, $row['kejadian']);
            $sheet->setCellValue('C' . $numRow, $row['nama_mobil']);
            $sheet->setCellValue('D' . $numRow, $row['nama_pt1']);
            $sheet->setCellValue('E' . $numRow, $row['nama_pt2']);
            $sheet->setCellValue('F' . $numRow, $row['nama_pt3']);
            $sheet->setCellValue('G' . $numRow, $row['nama_pt4']);
            $sheet->setCellValue('H' . $numRow, $row['odo_awal']);
            $sheet->setCellValue('I' . $numRow, $row['odo_akhir']);
            $sheet->setCellValue('J' . $numRow, date('d-m-Y H:i', strtotime($row['waktu_tiba'])));

            $sheet->getStyle('A' . $numRow)->applyFromArray($styleColumn);

            $sheet->getStyle('A' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('B' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('C' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('D' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('E' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('F' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('G' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('H' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('I' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('J' . $numRow)->applyFromArray($borderArray);

            $no++;
            $numRow++;
        endforeach;

        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setTitle('Data Mobil Petugas');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Mobil Petugas.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function laporanMobilTerlibat()
    {
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');

        $laporan = new Datamobilkorban();
        $dataLaporan = $laporan->dataExcel($tglawal, $tglakhir);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $styleColumn = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];

        $borderArray = [
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ]
        ];

        $sheet->setCellValue('A1', 'DATA MOBIL TERLIBAT BULANAN SENKOM');
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('A1')->applyFromArray($styleColumn);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'NO Kejadian');
        $sheet->setCellValue('C3', 'Nama Pengemudi');
        $sheet->setCellValue('D3', 'Jenis Kelamin');
        $sheet->setCellValue('E3', 'Jenis Mobil');
        $sheet->setCellValue('F3', 'Golongan Mobil');
        $sheet->setCellValue('G3', 'Merk Mobil');
        $sheet->setCellValue('H3', 'Nopol Mobil');
        $sheet->setCellValue('I3', 'Mobil Derek');
        $sheet->setCellValue('J3', 'Warna Mobil');
        $sheet->setCellValue('K3', 'Kondisi Mobil');

        $sheet->getStyle('A3')->applyFromArray($styleColumn);
        $sheet->getStyle('B3')->applyFromArray($styleColumn);
        $sheet->getStyle('C3')->applyFromArray($styleColumn);
        $sheet->getStyle('D3')->applyFromArray($styleColumn);
        $sheet->getStyle('E3')->applyFromArray($styleColumn);
        $sheet->getStyle('F3')->applyFromArray($styleColumn);
        $sheet->getStyle('G3')->applyFromArray($styleColumn);
        $sheet->getStyle('H3')->applyFromArray($styleColumn);
        $sheet->getStyle('I3')->applyFromArray($styleColumn);
        $sheet->getStyle('J3')->applyFromArray($styleColumn);
        $sheet->getStyle('K3')->applyFromArray($styleColumn);

        $sheet->getStyle('A3')->applyFromArray($borderArray);
        $sheet->getStyle('B3')->applyFromArray($borderArray);
        $sheet->getStyle('C3')->applyFromArray($borderArray);
        $sheet->getStyle('D3')->applyFromArray($borderArray);
        $sheet->getStyle('E3')->applyFromArray($borderArray);
        $sheet->getStyle('F3')->applyFromArray($borderArray);
        $sheet->getStyle('G3')->applyFromArray($borderArray);
        $sheet->getStyle('H3')->applyFromArray($borderArray);
        $sheet->getStyle('I3')->applyFromArray($borderArray);
        $sheet->getStyle('J3')->applyFromArray($borderArray);
        $sheet->getStyle('K3')->applyFromArray($borderArray);

        $no = 1;
        $numRow = 4;

        foreach ($dataLaporan->getResultArray() as $row) :

            $sheet->setCellValue('A' . $numRow, $no);
            $sheet->setCellValue('B' . $numRow, $row['kejadian_id']);
            $sheet->setCellValue('C' . $numRow, $row['nama']);
            $sheet->setCellValue('D' . $numRow, $row['jenis_kelamin']);
            $sheet->setCellValue('E' . $numRow, $row['jenis_mobil_korban']);
            $sheet->setCellValue('F' . $numRow, $row['golongan_mobil']);
            $sheet->setCellValue('G' . $numRow, $row['merk_mobil_korban']);
            $sheet->setCellValue('H' . $numRow, $row['nopol_mobil_korban']);
            $sheet->setCellValue('I' . $numRow, $row['mobil_derek']);
            $sheet->setCellValue('J' . $numRow, $row['warna_mobil']);
            $sheet->setCellValue('K' . $numRow, $row['kondisi_kendaraan']);


            $sheet->getStyle('A' . $numRow)->applyFromArray($styleColumn);

            $sheet->getStyle('A' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('B' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('C' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('D' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('E' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('F' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('G' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('H' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('I' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('J' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('K' . $numRow)->applyFromArray($borderArray);

            $no++;
            $numRow++;
        endforeach;

        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setTitle('Data Mobil Terlibat');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Mobil Terlibat.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function laporanKorbanKecelakaan()
    {
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');

        $laporan = new Datakorban();
        $dataLaporan = $laporan->dataExcel($tglawal, $tglakhir);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $styleColumn = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];

        $borderArray = [
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ]
        ];

        $sheet->setCellValue('A1', 'DATA KORBAN KECELAKAAN BULANAN SENKOM');
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('A1')->applyFromArray($styleColumn);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'NO Kejadian');
        $sheet->setCellValue('C3', 'Nama');
        $sheet->setCellValue('D3', 'Jenis Kelamin');
        $sheet->setCellValue('E3', 'No Tlp Korban');
        $sheet->setCellValue('F3', 'SIM');
        $sheet->setCellValue('G3', 'KTP');
        $sheet->setCellValue('H3', 'Alamat');
        $sheet->setCellValue('I3', 'Kondisi Korban');

        $sheet->getStyle('A3')->applyFromArray($styleColumn);
        $sheet->getStyle('B3')->applyFromArray($styleColumn);
        $sheet->getStyle('C3')->applyFromArray($styleColumn);
        $sheet->getStyle('D3')->applyFromArray($styleColumn);
        $sheet->getStyle('E3')->applyFromArray($styleColumn);
        $sheet->getStyle('F3')->applyFromArray($styleColumn);
        $sheet->getStyle('G3')->applyFromArray($styleColumn);
        $sheet->getStyle('H3')->applyFromArray($styleColumn);
        $sheet->getStyle('I3')->applyFromArray($styleColumn);

        $sheet->getStyle('A3')->applyFromArray($borderArray);
        $sheet->getStyle('B3')->applyFromArray($borderArray);
        $sheet->getStyle('C3')->applyFromArray($borderArray);
        $sheet->getStyle('D3')->applyFromArray($borderArray);
        $sheet->getStyle('E3')->applyFromArray($borderArray);
        $sheet->getStyle('F3')->applyFromArray($borderArray);
        $sheet->getStyle('G3')->applyFromArray($borderArray);
        $sheet->getStyle('H3')->applyFromArray($borderArray);
        $sheet->getStyle('I3')->applyFromArray($borderArray);

        $no = 1;
        $numRow = 4;

        foreach ($dataLaporan->getResultArray() as $row) :

            $sheet->setCellValue('A' . $numRow, $no);
            $sheet->setCellValue('B' . $numRow, $row['kejadian_id']);
            $sheet->setCellValue('C' . $numRow, $row['nama_korban']);
            $sheet->setCellValue('D' . $numRow, $row['jenkel_korban']);
            $sheet->setCellValue('E' . $numRow, $row['notlp_korban']);
            $sheet->setCellValue('F' . $numRow, $row['sim_korban']);
            $sheet->setCellValue('G' . $numRow, $row['ktp_korban']);
            $sheet->setCellValue('H' . $numRow, $row['alamat_korban']);
            $sheet->setCellValue('I' . $numRow, $row['kondisi_korban']);


            $sheet->getStyle('A' . $numRow)->applyFromArray($styleColumn);

            $sheet->getStyle('A' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('B' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('C' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('D' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('E' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('F' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('G' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('H' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('I' . $numRow)->applyFromArray($borderArray);

            $no++;
            $numRow++;
        endforeach;

        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setTitle('Data Korban Kecelakaan');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Korban Kecelakaan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function laporanBbmMobil()
    {
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');

        $laporan = new DataBbm();
        $dataLaporan = $laporan->dataExcel($tglawal, $tglakhir);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $styleColumn = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];

        $borderArray = [
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ]
        ];

        $sheet->setCellValue('A1', 'DATA PENGISIAN BBM BULANAN SENKOM');
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('A1')->applyFromArray($styleColumn);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Tanggal Pengisian');
        $sheet->setCellValue('C3', 'Nama Mobil');
        $sheet->setCellValue('D3', 'Jenis BBM');
        $sheet->setCellValue('E3', 'Jumlah BBM');
        $sheet->setCellValue('F3', 'Shift');

        $sheet->getStyle('A3')->applyFromArray($styleColumn);
        $sheet->getStyle('B3')->applyFromArray($styleColumn);
        $sheet->getStyle('C3')->applyFromArray($styleColumn);
        $sheet->getStyle('D3')->applyFromArray($styleColumn);
        $sheet->getStyle('E3')->applyFromArray($styleColumn);
        $sheet->getStyle('F3')->applyFromArray($styleColumn);

        $sheet->getStyle('A3')->applyFromArray($borderArray);
        $sheet->getStyle('B3')->applyFromArray($borderArray);
        $sheet->getStyle('C3')->applyFromArray($borderArray);
        $sheet->getStyle('D3')->applyFromArray($borderArray);
        $sheet->getStyle('E3')->applyFromArray($borderArray);
        $sheet->getStyle('F3')->applyFromArray($borderArray);

        $no = 1;
        $numRow = 4;

        foreach ($dataLaporan->getResultArray() as $row) :

            $sheet->setCellValue('A' . $numRow, $no);
            $sheet->setCellValue('B' . $numRow, date('d-m-Y H:i', strtotime($row['tanggal_bbm'])));
            $sheet->setCellValue('C' . $numRow, $row['nama_mobil']);
            $sheet->setCellValue('D' . $numRow, $row['jenis_bbm']);
            $sheet->setCellValue('E' . $numRow, $row['jumlah_bbm']);
            $sheet->setCellValue('F' . $numRow, $row['shift_bbm']);

            $sheet->getStyle('A' . $numRow)->applyFromArray($styleColumn);

            $sheet->getStyle('A' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('B' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('C' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('D' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('E' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('F' . $numRow)->applyFromArray($borderArray);

            $no++;
            $numRow++;
        endforeach;

        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setTitle('Data Pengisian BBM');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Pengisian BBM.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function laporanTerkaitKejadian()
    {
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');

        $laporan = new Datadetaillaporan();
        $dataLaporan = $laporan->dataExcel($tglawal, $tglakhir);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $styleColumn = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];

        $borderArray = [
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ]
        ];

        $sheet->setCellValue('A1', 'Data LAPORAN TERKAIT KEJADIAN BULANAN SENKOM');
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('A1')->applyFromArray($styleColumn);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'No Kejadian');
        $sheet->setCellValue('C3', 'No Laporan');
        $sheet->setCellValue('D3', 'Tanggal Laporan');
        $sheet->setCellValue('E3', 'Nama Pelapor');
        $sheet->setCellValue('F3', 'Kategori Laporan');
        $sheet->setCellValue('G3', 'Kontak Pelapor');
        $sheet->setCellValue('H3', 'No Tlp Pelapor');
        $sheet->setCellValue('I3', 'Sumber Informasi');
        $sheet->setCellValue('J3', 'Kode Gangguan');

        $sheet->getStyle('A3')->applyFromArray($styleColumn);
        $sheet->getStyle('B3')->applyFromArray($styleColumn);
        $sheet->getStyle('C3')->applyFromArray($styleColumn);
        $sheet->getStyle('D3')->applyFromArray($styleColumn);
        $sheet->getStyle('E3')->applyFromArray($styleColumn);
        $sheet->getStyle('F3')->applyFromArray($styleColumn);
        $sheet->getStyle('G3')->applyFromArray($styleColumn);
        $sheet->getStyle('H3')->applyFromArray($styleColumn);
        $sheet->getStyle('I3')->applyFromArray($styleColumn);
        $sheet->getStyle('J3')->applyFromArray($styleColumn);

        $sheet->getStyle('A3')->applyFromArray($borderArray);
        $sheet->getStyle('B3')->applyFromArray($borderArray);
        $sheet->getStyle('C3')->applyFromArray($borderArray);
        $sheet->getStyle('D3')->applyFromArray($borderArray);
        $sheet->getStyle('E3')->applyFromArray($borderArray);
        $sheet->getStyle('F3')->applyFromArray($borderArray);
        $sheet->getStyle('G3')->applyFromArray($borderArray);
        $sheet->getStyle('H3')->applyFromArray($borderArray);
        $sheet->getStyle('I3')->applyFromArray($borderArray);
        $sheet->getStyle('J3')->applyFromArray($borderArray);

        $no = 1;
        $numRow = 4;

        foreach ($dataLaporan->getResultArray() as $row) :

            $sheet->setCellValue('A' . $numRow, $no);
            $sheet->setCellValue('B' . $numRow, $row['kejadian_id']);
            $sheet->setCellValue('C' . $numRow, $row['no_laporan']);
            $sheet->setCellValue('D' . $numRow, date('d-m-Y H:i', strtotime($row['tgl_laporan'])));
            $sheet->setCellValue('E' . $numRow, $row['nama_pelapor']);
            $sheet->setCellValue('F' . $numRow, $row['kategori_laporan']);
            $sheet->setCellValue('G' . $numRow, $row['kontak_pelapor']);
            $sheet->setCellValue('H' . $numRow, $row['notlp_pelapor']);
            $sheet->setCellValue('I' . $numRow, $row['deskripsi_informasi']);
            $sheet->setCellValue('J' . $numRow, $row['deskripsi_gangguan']);


            $sheet->getStyle('A' . $numRow)->applyFromArray($styleColumn);

            $sheet->getStyle('A' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('B' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('C' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('D' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('E' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('F' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('G' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('H' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('I' . $numRow)->applyFromArray($borderArray);
            $sheet->getStyle('J' . $numRow)->applyFromArray($borderArray);

            $no++;
            $numRow++;
        endforeach;

        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setTitle('Data Laporan Terkait Kejadian');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Laporan Terkait Kejadian.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
