# Graph Report - sito-web  (2026-10-09)

## Corpus Check
- 47 files · ~51,442 words
- Verdict: corpus is large enough that graph structure adds value.
- Unclassified: 4 file(s) not represented in the graph (top: (none) 2, .xml 1, .css 1)

## Summary
- 150 nodes · 219 edges · 17 communities (9 shown, 8 thin omitted)
- Extraction: 81% EXTRACTED · 19% INFERRED · 0% AMBIGUOUS · INFERRED: 41 edges (avg confidence: 0.84)
- Token cost: 0 input · 0 output

## Community Hubs (Navigation)
- Compliance & Robocall Modules
- Suite Catalog & Core Apps
- Regulatory Modules & Founders
- Company & Partner Network
- Site Chrome & Legal
- EU AI Act Module
- 231 / Whistleblowing / FESR
- ClinicalDB Features
- Home & Back-Office Service
- APS Logo
- Mario Portrait
- Piero Portrait
- Mario Portrait (root)
- Piero Portrait (root)

## God Nodes (most connected - your core abstractions)
1. `Catalogo Moduli Suite UNICO` - 20 edges
2. `Richiedi Accesso DEMO` - 12 edges
3. `UnicoOAM (LIVE)` - 11 edges
4. `Home Page Suite UNICO` - 10 edges
5. `Partner & Network Consulenti` - 10 edges
6. `UnicoGDPR (LIVE)` - 10 edges
7. `UnicoCALL (LIVE)` - 10 edges
8. `UnicoPQC (IN SVILUPPO)` - 10 edges
9. `Scheda UnicoAIACT` - 9 edges
10. `UnicoConsultant` - 9 edges

## Surprising Connections (you probably didn't know these)
- `Motore AI di lettura allegati` --semantically_similar_to--> `Cooabit`  [INFERRED] [semantically similar]
  prodotti/UnicoLoan.html → partner.html
- `UnicoGDPR` --semantically_similar_to--> `UnicoGDPR (LIVE)`  [INFERRED] [semantically similar]
  prodotti/unicoAIACT.html → prodotti.html
- `UnicoCyber` --semantically_similar_to--> `UnicoCyber (IN SVILUPPO)`  [INFERRED] [semantically similar]
  prodotti/unicoAIACT.html → prodotti.html
- `UnicoPQC` --semantically_similar_to--> `UnicoPQC (IN SVILUPPO)`  [INFERRED] [semantically similar]
  prodotti/unicoAIACT.html → prodotti.html
- `UnicoBPM` --semantically_similar_to--> `UnicoBPM (LIVE)`  [INFERRED] [semantically similar]
  prodotti/UnicoLoan.html → prodotti.html

## Import Cycles
- None detected.

## Hyperedges (group relationships)
- **Modello Service Integrato: tecnologia, partner software, network consulenti** — chi_siamo_service_integrato, chi_siamo_mediafacile, chi_siamo_network_consulenti [EXTRACTED 0.85]
- **Pilastri di conformita UnicoAIACT** — prodotti_unicoaiact_inventario_rischio, prodotti_unicoaiact_fria, prodotti_unicoaiact_human_oversight, prodotti_unicoaiact_bias_audit [EXTRACTED 0.85]
- **Flusso UnicoLoan: email, motore AI, pratica, UnicoBPM** — prodotti_unicoloan_email_mobile, prodotti_unicoloan_motore_ai, prodotti_unicoloan_unicobpm [EXTRACTED 0.85]
- **Moduli con governance Matrice RACI e log immutabili** — prodotti_unicobpm, prodotti_unicoconsultant, prodotti_unicogdpr, prodotti_uniconis [EXTRACTED 1.00]
- **Moduli cyber-resilienza DORA NIS2 PQC** — prodotti_unicodora, prodotti_uniconis, prodotti_unicopqc [EXTRACTED 1.00]
- **Moduli integrati con MediaFacile** — prodotti_unicobpm, prodotti_unicocoge, prodotti_unicooam [EXTRACTED 1.00]

## Communities (17 total, 8 thin omitted)

### Community 0 - "Compliance & Robocall Modules"
Cohesion: 0.11
Nodes (24): Matrice RACI, UnicoCALL (LIVE), Decreto Bollette, Gestione Robocall, Registro Pubblico delle Opposizioni (RPO), UnicoConsultant, Compliance Health Score, Scadenziario Multi-Azienda (+16 more)

### Community 1 - "Suite Catalog & Core Apps"
Cohesion: 0.13
Nodes (22): Catalogo Moduli Suite UNICO, ClinicalDB (LIVE), DAIshboard (LIVE), UnicoBPM (LIVE), Log Immutabili SHA-256, MediaFacile, UnicoCOGE (LIVE), Calcolo ENASARCO (+14 more)

### Community 2 - "Regulatory Modules & Founders"
Cohesion: 0.11
Nodes (20): UnicoNIS, llms.txt Suite UNICO, Ciro Di Leva, Pier Giuseppe Meo, UnicoAIACT, UnicoDORA, UnicoPQC, UnicoWhistle (+12 more)

### Community 3 - "Company & Partner Network"
Cohesion: 0.15
Nodes (18): Chi Siamo & Service Integrato, Mediafacile, Network Consulenti Accreditati, Modello di Service Integrato, Michele Ferri, Header di navigazione, Partner & Network Consulenti, Cooabit (+10 more)

### Community 4 - "Site Chrome & Legal"
Cohesion: 0.24
Nodes (10): Pagina Contatti, Footer del sito, Hassisto S.r.l., Pagina Richiesta Inviata (Grazie), Note Legali & Informazioni Societarie, Hassisto S.r.l., Cookie Policy, Google Analytics (_ga) (+2 more)

### Community 5 - "EU AI Act Module"
Cohesion: 0.31
Nodes (10): Framing e Mitigation del Rischio nell'EU AI Act (Zenodo), Audit Bias e registrazione EU Database, Regolamento UE 2024/1689 (EU AI Act), FRIA - Fundamental Rights Impact Assessment, Human Oversight e Kill Switch, Inventario e classificazione rischio AI, Scheda UnicoAIACT, UnicoCyber (+2 more)

### Community 6 - "231 / Whistleblowing / FESR"
Cohesion: 0.24
Nodes (10): UnicoCyber (IN SVILUPPO), D.Lgs. 231/2001 Art. 24-bis, Organismo di Vigilanza (OdV), UnicoFESR (IN SVILUPPO), Fondi Europei POR FESR / FSE+ / PNRR, UnicoWhistle (LIVE), D.Lgs. 24/2023 Whistleblowing, Prospetto Generale Applicativi & Matrice Integrazioni (+2 more)

### Community 7 - "ClinicalDB Features"
Cohesion: 0.31
Nodes (9): Anagrafica pazienti, Follow-up clinici, Scheda ClinicalDB, Percorso clinico / studio, Assistente dati in linguaggio naturale, Studi e coorti cliniche con filtri salvati, Drill-down tabelle, Export Excel e link pubblico read-only (+1 more)

### Community 8 - "Home & Back-Office Service"
Cohesion: 0.36
Nodes (7): Home Page Suite UNICO, Servizio Back-Office in Service, Suite UNICO, UnicoBPM, UnicoConsultant, UnicoGDPR, UnicoOAM

## Knowledge Gaps
- **51 isolated node(s):** `UnicoBPM`, `Modello di Service Integrato`, `Pagina Richiesta Inviata (Grazie)`, `Michele Ferri`, `Ciro Di Leva` (+46 more)
  These have ≤1 connection - possible missing edges or undocumented components. (Counts symbols only; 58 node(s) total have ≤1 connection when file, concept and rationale nodes are included.)
- **8 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Catalogo Moduli Suite UNICO` connect `Suite Catalog & Core Apps` to `Compliance & Robocall Modules`, `Regulatory Modules & Founders`, `Company & Partner Network`, `Site Chrome & Legal`, `231 / Whistleblowing / FESR`, `Home & Back-Office Service`?**
  _High betweenness centrality (0.426) - this node is a cross-community bridge._
- **Are the 3 inferred relationships involving `UnicoOAM (LIVE)` (e.g. with `UnicoOAM` and `UnicoCOGE (LIVE)`) actually correct?**
  _`UnicoOAM (LIVE)` has 3 INFERRED edges - model-reasoned connections that need verification._
- **What connects `UnicoBPM`, `Modello di Service Integrato`, `Pagina Richiesta Inviata (Grazie)` to the rest of the system?**
  _51 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Compliance & Robocall Modules` be split into smaller, more focused modules?**
  _Cohesion score 0.11333333333333333 - nodes in this community are weakly interconnected._
- **Why does `Footer del sito` connect `Site Chrome & Legal` to `Suite Catalog & Core Apps`, `Regulatory Modules & Founders`, `Company & Partner Network`?**
  _High betweenness centrality (0.125) - this node is a cross-community bridge._
- **Are the 2 inferred relationships involving `Partner & Network Consulenti` (e.g. with `Partner & Network Consulenti (variante partners)` and `Partner & Network Consulenti (variante partnerx)`) actually correct?**
  _`Partner & Network Consulenti` has 2 INFERRED edges - model-reasoned connections that need verification._
- **Should `Suite Catalog & Core Apps` be split into smaller, more focused modules?**
  _Cohesion score 0.12987012987012986 - nodes in this community are weakly interconnected._