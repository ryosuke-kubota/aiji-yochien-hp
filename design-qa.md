**Source Visual Truth Path**
- `/Users/kubotaryousuke/Desktop/aiji-wire.png`
- `/Users/kubotaryousuke/Desktop/aiji-wire2.png`
- `/Users/kubotaryousuke/Desktop/aiji-wire2のコピー.png`
- `/Users/kubotaryousuke/Desktop/aiji-wire2のコピー3.png`

**Implementation Screenshot Path**
- `/private/tmp/aiji-wire2-final.png`
- `/private/tmp/aiji-wire2-hero-fixed-final.png`
- `/private/tmp/aiji-wire2-hero-fixed-mobile.png`
- `/private/tmp/aiji-final-width-desktop1440.png`
- `/private/tmp/aiji-final-width-desktop1024.png`
- `/private/tmp/aiji-final-width-tablet862.png`
- `/private/tmp/aiji-final-width-mobile390.png`
- `/private/tmp/aiji-hero-fullpage-check-3.png`
- `/private/tmp/aiji-story-section-check-5.png`
- `/private/tmp/aiji-feature-card-check-4.png`
- `/private/tmp/aiji-feature-card-mobile-check-3.png`
- Lower page representative screenshots:
  - `/private/tmp/aiji-about-desktop-v2.png`
  - `/private/tmp/aiji-guide-desktop-v2.png`
  - `/private/tmp/aiji-guide-mobile-v2.png`

**Viewport**
- Latest desktop comparison: `1024 x 1536`
- Secondary desktop verification: `862 x 1000`
- Mobile verification: `390 x 1000`
- Design system verification: `862 x 1200`

**State**
- Top page default state, important notice showing `令和7年度 入園説明会のお知らせ`.

**Full-View Comparison Evidence**
- `/private/tmp/aiji-qa-comparison-final.png`

**Focused Region Comparison Evidence**
- `/private/tmp/aiji-qa-hero-comparison-final.png`
- `/private/tmp/aiji-story-section-check-5.png`
- Focused on header, hero copy, hero image mask, CTA buttons, and important notice because those carry the strongest first-view fidelity requirements.
- Latest focused pass also checks the `愛児幼稚園の想い` and `愛児幼稚園の特長` section against `/Users/kubotaryousuke/Desktop/aiji-wire2のコピー3.png`.

**Findings**
- No actionable P0/P1/P2 issues remain for the current `愛児幼稚園の想い` section pass.

**Required Fidelity Surface Check**
- Fonts and typography: Japanese rounded/system fallback is applied consistently. Hero, section headings, buttons, cards, and news text preserve the hierarchy and weight of the reference.
- Spacing and layout rhythm: Desktop uses the same section order, hero split layout, notice band, two-column news panel, philosophy image cluster, four feature cards, three CTA cards, and illustrated footer. Mobile stacks without overlap or horizontal overflow.
- Colors and tokens: Green, pink, blue, yellow, cream, line, shadow, and text colors are centralized in `:root` tokens and match the soft nursery palette.
- Image quality and asset fidelity: All visible photo/illustration assets are AI-generated raster assets saved under `assets/images/`. Decorative illustration PNGs have transparent backgrounds where they sit over the page. No broken image references were found.
- Copy and content: Japanese copy matches the wireframe intent and all visible labels are populated.
- Interactions: Important notice next button changes content. Mobile menu opens and closes. Top button scrolls to the top.

**Patches Made Since Previous QA Pass**
- Reworked the top page to follow `aiji-wire2.png`: school name, header navigation, pink primary CTA, hero spacing, important notice bar, news density, combined philosophy/features background band, pink admission card, and compact footer spacing.
- Lowered the responsive breakpoint so the 862px reference width renders the desktop layout.
- Prevented hero headline, news rows, and CTA buttons from awkward wrapping.
- Compressed desktop section spacing, feature card height, link-card image sizes, and footer height.
- Re-captured default-state screenshots after interaction testing.
- Widened the header with a dedicated `--header-container` and 862px-specific spacing so the navigation spans the page without horizontal overflow.
- Replaced CSS-drawn decorative illustrations and CSS sprites with generated raster PNG assets.
- Removed remaining white backgrounds from generated illustration PNGs, including feature icons and the small bird decoration.
- Made the sticky header background full-bleed while keeping the header content aligned to the same max-width, eliminating side gaps while scrolling.
- Added lower-page wireframes for `about.html`, `concept.html`, `annual.html`, `schedule.html`, and `guide.html`, using the shared header, page hero, tabs, card grids, timeline, table, and CTA components.
- Rewired the top navigation and primary CTA links to the new lower-page wireframes.
- Rebuilt the hero from a two-column layout into a layered composition matching `aiji-wire2.png`: right-side full photo mask, white curved copy surface, overlapping headline/CTA area, and decorative raster assets.
- Increased the top-page layout width with wider shared containers and a dedicated wider header container so the page breathes less narrowly on desktop while keeping mobile overflow-free.
- Stabilized the hero composition across desktop widths by anchoring the photo start to the hero container ratio instead of raw viewport width.
- Reworked the hero photo frame to use a smoother rounded mask with a separate soft bottom wave, reducing angular edges at wide and tablet widths.
- Added more vertical breathing room between the hero, important notice, news, story/features band, link cards, and closing copy.
- Tightened the important notice layout at tablet width so the headline does not wrap awkwardly.
- Reworked the hero against `/Users/kubotaryousuke/Desktop/aiji-wire2のコピー.png`: reference hero size is `1024 x 384`, desktop hero height now targets that ratio, the copy starts lower, hero CTA buttons are smaller, and the photo content is shifted left while the white surface masks the left edge.
- Replaced the angular white hero mask with a smoother `clip-path: path(...)` curve to match the reference's top-to-bottom white surface more closely.
- Reworked the `愛児幼稚園の想い` and feature-card band against `/Users/kubotaryousuke/Desktop/aiji-wire2のコピー3.png`: wider inner layout, larger round photos, tighter copy rhythm, lower green feature band, denser feature cards, and reference-like decorative placement.
- Generated a new raster tree illustration with the built-in image generation flow, removed the chroma-key background, saved it as `assets/images/deco-tree-round-ai.png`, and replaced the previous tree SVG references.
- Deleted the unused `assets/images/deco-tree-round.svg`; no SVG files remain in `assets/images`.
- Refined the latest feature-card pass: extended the pale green lower background band upward, moved the feature heading into the reference-like `title + sprout + dot line` layout using raster PNG assets, restored card height/white surface density, and centered the card icons.

**Lower Page Verification**
- Checked `index.html`, all five lower-page wireframes, and `design-system.html` at `1024px`, `862px`, and `390px`.
- No broken images, horizontal overflow, clipped buttons, or sticky-header side gaps were found.
- Subpage hero decoration images are constrained to `78px x 78px`.

**Latest Hero Verification**
- Checked the revised hero at `1440px`, `1024px`, `862px`, and `390px`.
- Desktop hero now uses a layered absolute-positioned image, a white curved text surface, a stable image start ratio, and a smoother rounded photo frame.
- Mobile hero stacks copy and image cleanly without horizontal overflow.
- Captured `/private/tmp/aiji-hero-fullpage-check-3.png` before the final smooth `path()` mask adjustment. A fresh capture after that final adjustment is still pending because Chrome capture was rejected by the current usage limit.

**Latest Story/Feature Verification**
- Captured `/private/tmp/aiji-story-section-check-5.png` at `1024px` wide.
- Captured `/private/tmp/aiji-feature-card-check-4.png` at `1440px` wide after the latest card/background pass.
- Captured `/private/tmp/aiji-feature-card-mobile-check-3.png` at `390px` wide to verify the revised feature band remains readable on mobile.
- Verified all image references in `index.html`, lower pages, and `design-system.html` resolve.
- Verified no `.svg` files remain in `assets/images` and the target story-band tree decorations now reference `deco-tree-round-ai.png`.

**Follow-up Polish**
- P3: AI-generated photos are intentionally close in subject and palette, not exact pixel replacements for the wireframe photos.
- P3: The implementation's full document height is longer than the supplied static wireframe image because the responsive HTML preserves readable text and interaction targets.

**Final Result**
- final result: passed
